<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\AdminAuth;
use App\Helpers\EmailVerifier;

// ─── HOME ────────────────────────────────────────────────────────────────────
Route::get('/', function () {
    $sponsors = DB::table('sponsors')->where('is_posted', true)->latest()->get();
    $postedPartners = DB::table('partners')->where('is_posted', true)->latest()->get();
    return view('welcome', compact('sponsors', 'postedPartners'));
});

// ─── ABOUT ───────────────────────────────────────────────────────────────────
Route::get('/about', function () {
    return view('pages.about');
});

// ─── CONTACT ─────────────────────────────────────────────────────────────────
Route::get('/contact', function () {
    return view('pages.contact');
});

Route::post('/contact-submit', function (Request $request) {
    $email = $request->input('email');
    if ($email && !EmailVerifier::verify($email)) {
        return response()->json(['success' => false, 'data' => ['message' => "This email doesn't exist."]]);
    }

    $name = $request->input('name');
    DB::table('wp_wennovate_feedback')->insert([
        'name' => $name,
        'email' => $email,
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
        'is_posted' => false,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    // Log to notifications table
    DB::table('notifications')->insert(['type' => 'feedback', 'action' => 'submitted', 'message' => ($name ?? 'Someone') . ' sent feedback', 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
    return response()->json(['success' => true]);
});

Route::post('/subscribe-submit', function (Request $request) {
    $email = $request->input('email');
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return response()->json(['success' => false, 'message' => "Invalid email format."]);
    }
    
    if (!EmailVerifier::verify($email)) {
        return response()->json(['success' => false, 'message' => "This email doesn't exist."]);
    }

    $exists = DB::table('subscribers')->where('email', $email)->exists();
    if (!$exists) {
        DB::table('subscribers')->insert([
            'email' => $email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('notifications')->insert(['type' => 'feedback', 'action' => 'subscribed', 'message' => 'New subscriber: ' . $email, 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
    }

    return response()->json(['success' => true]);
});

Route::post('/verify-email-ajax', function (Request $request) {
    $email = $request->input('email');
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return response()->json(['success' => false, 'message' => "Invalid email format."]);
    }
    
    if (!EmailVerifier::verify($email)) {
        return response()->json(['success' => false, 'message' => "This email doesn't exist."]);
    }
    
    return response()->json(['success' => true]);
});

// ─── SPONSOR / PARTNER (public form submit) ───────────────────────────────────
Route::get('/sponsor-partner', function () {
    return view('pages.sponsor-partner');
});

Route::get('/detailed-partner', function () {
    return view('pages.detailed-partner');
});

Route::post('/sponsor-submit', function (Request $request) {
    $email = $request->input('email');
    if ($email && !EmailVerifier::verify($email)) {
        return back()->with('error', "This email doesn't exist.")->withInput();
    }

    $logoPath = null;
    if ($request->hasFile('company_logo')) {
        $logoPath = $request->file('company_logo')->store('partners', 'public');
    }

    DB::table('partners')->insert([
        'company_name' => $request->input('company_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'logo_path' => $logoPath,
        'source' => 'public', // public form submission
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'Thank you! Your partnership application has been received.');
})->name('sponsor.store');

// ─── ADMIN AUTHENTICATION HELPERS ────────────────────────────────────────────
function getAdminCredentials()
{
    $path = storage_path('app/admin.json');
    if (!file_exists($path)) {
        return [
            'email' => 'wennovate@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ];
    }
    return json_decode(file_get_contents($path), true);
}

function saveAdminCredentials($email, $password)
{
    file_put_contents(storage_path('app/admin.json'), json_encode([
        'email' => $email,
        'password' => \Illuminate\Support\Facades\Hash::make($password)
    ]));
}

// ─── ADMIN AUTHENTICATION ────────────────────────────────────────────────────
Route::get('/login', function () {
    if (session('admin_logged_in'))
        return redirect('/dashboard');
    return view('pages.login');
});

Route::post('/login', function (Request $request) {
    $creds = getAdminCredentials();
    if ($request->input('email') === $creds['email'] && \Illuminate\Support\Facades\Hash::check($request->input('password'), $creds['password'])) {
        session(['admin_logged_in' => true]);
        return redirect('/dashboard');
    }
    return back()->with('error', 'Invalid email or password.')->withInput();
});

Route::post('/logout', function () {
    session()->forget('admin_logged_in');
    return redirect('/login');
});

// ─── DASHBOARD (PROTECTED) ───────────────────────────────────────────────────
Route::middleware([AdminAuth::class])->group(function () {

    Route::get('/dashboard', function () {
            $feedbacks = DB::table('wp_wennovate_feedback')->latest()->get();
            $sponsors = DB::table('sponsors')->latest()->get();
            $partners = DB::table('partners')->latest()->get();
            $broadcasts = DB::table('broadcasts')->latest()->get();
            $adminEmail = getAdminCredentials()['email'];

            // Read from notifications table
            $allNotifs = DB::table('notifications')->latest()->take(30)->get();
            $unreadNotifs = DB::table('notifications')->where('is_read', false)->latest()->take(30)->get();
            $unpostedCount = $unreadNotifs->count();
            $notifItems = $unreadNotifs->map(fn($n) => [
            'type' => $n->type,
            'label' => $n->message,
            'time' => $n->created_at,
            ]);

            // Recent activities: latest 5 notifications regardless of read state
            $recentActivities = $allNotifs->take(5)->map(function ($n) {
                    $iconMap = [
                        'sponsor' => ['icon' => 'fas fa-handshake', 'color' => '#f59e0b'],
                        'partner' => ['icon' => 'fas fa-users', 'color' => '#a855f7'],
                        'feedback' => ['icon' => 'fas fa-comment-alt', 'color' => '#22c55e'],
                    ];
                    $ic = $iconMap[$n->type] ?? ['icon' => 'fas fa-bell', 'color' => '#64748b'];
                    return [
                    'type' => $n->type,
                    'icon' => $ic['icon'],
                    'color' => $ic['color'],
                    'label' => $n->message,
                    'time' => \Carbon\Carbon::parse($n->created_at)->diffForHumans(),
                    ];
                }
                );

                // Fetch all attendees with their booking status (only paid)
                $attendees = DB::table('attendees')
                    ->join('bookings', 'attendees.booking_id', '=', 'bookings.id')
                    ->select('attendees.*', 'bookings.status as booking_status', 'bookings.tx_ref')
                    ->where('bookings.status', 'paid')
                    ->latest('attendees.created_at')
                    ->get();

                $totalRevenue = DB::table('bookings')->where('status', 'paid')->sum('total_usd');
                $totalBookings = DB::table('attendees')
                    ->join('bookings', 'attendees.booking_id', '=', 'bookings.id')
                    ->where('bookings.status', 'paid')
                    ->count();

                $pureSubscribers = DB::table('subscribers')->latest()->get();

                $totalSubscribers = collect([
                    $attendees->pluck('email'),
                    $sponsors->pluck('email'),
                    $partners->pluck('email'),
                    $feedbacks->pluck('email'),
                    $pureSubscribers->pluck('email')
                ])->flatten()->filter()->unique()->count();

                return view('pages.dashboard', compact('feedbacks', 'sponsors', 'partners', 'broadcasts', 'adminEmail', 'unpostedCount', 'notifItems', 'recentActivities', 'attendees', 'totalRevenue', 'totalBookings', 'totalSubscribers', 'pureSubscribers'));
            }
            );

            // Dashboard: Approve Attendee & Send QR Code
            Route::post('/dashboard/attendee-approve', function (Request $request) {
            $id = $request->input('id');
            $attendee = DB::table('attendees')->where('id', $id)->first();

            if (!$attendee) {
                return response()->json(['success' => false, 'message' => 'Attendee not found']);
            }

            // Generate a unique QR token if not already present
            $qrToken = $attendee->qr_token;
            if (!$qrToken) {
                $qrToken = 'QR-' . uniqid() . '-' . rand(1000, 9999);
                DB::table('attendees')->where('id', $id)->update([
                    'is_approved' => true,
                    'qr_token' => $qrToken,
                    'updated_at' => now(),
                ]);
            }

            // Send Email with QR Code via api.qrserver.com
            $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode($qrToken);

            try {
                Mail::send('emails.ticket-qr', ['attendee' => $attendee, 'qrUrl' => $qrUrl], function ($message) use ($attendee) {
                            $message->to($attendee->email)->subject('Your Wennovate Summit Ticket & QR Code');
                        }
                        );
                        // Log notification
                        DB::table('notifications')->insert(['type' => 'partner', 'action' => 'approved', 'message' => 'Admin approved and sent QR to: ' . $attendee->name, 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
                        return response()->json(['success' => true]);
                    }
                    catch (\Exception $e) {
                        return response()->json(['success' => false, 'message' => 'Approved, but failed to send email: ' . $e->getMessage()]);
                    }
                }
                );

                // Dashboard: Add New Attendee (Admin side - auto approve & email)
                Route::post('/dashboard/attendee-add', function (Request $request) {
            $name = $request->input('name');
            $email = $request->input('email');
            $type = $request->input('ticket_type');
            $phone = $request->input('phone');

            if (!$name || !$email)
                return response()->json(['success' => false, 'message' => 'Name and email required']);

            if (!EmailVerifier::verify($email)) {
                return response()->json(['success' => false, 'message' => "This email doesn't exist."]);
            }

            // 1. Create a dummy "paid" booking since admin added them
            $txRef = 'WEN-ADMIN-' . strtoupper(uniqid());
            $bookingId = DB::table('bookings')->insertGetId([
                'tx_ref' => $txRef,
                'total_usd' => 0,
                'qty' => 1,
                'status' => 'paid',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 2. Generate QR token
            $qrToken = 'QR-' . uniqid() . '-' . rand(1000, 9999);

            // 3. Create the attendee directly as approved
            $attendeeId = DB::table('attendees')->insertGetId([
                'booking_id' => $bookingId,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'company_name' => $request->input('company_name', ''),
                'position' => $request->input('position', ''),
                'ticket_type' => $type,
                'photo_path' => '',
                'is_approved' => true,
                'qr_token' => $qrToken,
                'is_scanned' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $attendee = DB::table('attendees')->where('id', $attendeeId)->first();

            // 4. Send Email with QR Code
            $qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode($qrToken);
            try {
                Mail::send('emails.ticket-qr', ['attendee' => $attendee, 'qrUrl' => $qrUrl], function ($message) use ($attendee) {
                            $message->to($attendee->email)->subject('Your Wennovate Summit Ticket & QR Code');
                        }
                        );
                        DB::table('notifications')->insert(['type' => 'partner', 'action' => 'added', 'message' => 'Admin manually added & emailed ticket to: ' . $attendee->name, 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
                    }
                    catch (\Exception $e) {
                    // we still return success even if mail fails, but ideally log it
                    }

                    return response()->json([
                    'success' => true,
                    'attendee' => [
                    'id' => $attendee->id,
                    'name' => $attendee->name,
                    'email' => $attendee->email,
                    'ticket_type' => $attendee->ticket_type,
                    'phone' => $attendee->phone,
                    'booking_status' => 'paid',
                    'is_approved' => true,
                    'is_scanned' => false,
                    'tx_ref' => $txRef,
                    'total_usd' => 0,
                    'date' => now()->format('M d, Y') // match the JS table format
                    ]
                    ]);
                }
                );

                // Dashboard: Update Attendee
                Route::post('/dashboard/attendee-update', function (Request $request) {
            $id = $request->input('id');
            if (!$id)
                return response()->json(['success' => false, 'message' => 'No ID provided']);

            $attendee = DB::table('attendees')->where('id', $id)->first();
            if (!$attendee)
                return response()->json(['success' => false, 'message' => 'Attendee not found']);

            $email = $request->input('email');
            if ($email && !EmailVerifier::verify($email)) {
                return response()->json(['success' => false, 'message' => "This email doesn't exist."]);
            }

            DB::table('attendees')->where('id', $id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'ticket_type' => $request->input('ticket_type'),
                'phone' => $request->input('phone'),
                'company_name' => $request->input('company_name', ''),
                'position' => $request->input('position', ''),
                'updated_at' => now(),
            ]);

            DB::table('notifications')->insert([
                'type' => 'partner',
                'action' => 'updated',
                'message' => 'Admin updated booking details for: ' . $request->input('name'),
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json(['success' => true]);
        }
        );

        // Dashboard: Delete Attendee (and booking if last attendee)
        Route::post('/dashboard/attendee-delete', function (Request $request) {
            $id = $request->input('id');
            if (!$id)
                return response()->json(['success' => false, 'message' => 'No ID provided']);

            $attendee = DB::table('attendees')->where('id', $id)->first();
            if (!$attendee)
                return response()->json(['success' => false, 'message' => 'Attendee not found']);

            $bookingId = $attendee->booking_id;
            $attendeeName = $attendee->name;

            // Delete the attendee
            DB::table('attendees')->where('id', $id)->delete();

            // If no more attendees for this booking, delete the booking too
            $remaining = DB::table('attendees')->where('booking_id', $bookingId)->count();
            if ($remaining === 0) {
                DB::table('bookings')->where('id', $bookingId)->delete();
            }

            DB::table('notifications')->insert([
                'type' => 'partner',
                'action' => 'deleted',
                'message' => 'Admin deleted booking for: ' . $attendeeName,
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json(['success' => true]);
        }
        );

        // Dashboard: Scan QR Code Endpoint
        Route::post('/dashboard/scan-qr', function (Request $request) {
            $qrToken = $request->input('qr_token');
            if (!$qrToken) {
                return response()->json(['success' => false, 'message' => 'No QR Token provided']);
            }

            $attendee = DB::table('attendees')->where('qr_token', $qrToken)->first();

            if (!$attendee) {
                return response()->json(['success' => false, 'message' => 'Invalid QR Code. No attendee found.']);
            }

            if ($attendee->is_scanned) {
                return response()->json(['success' => false, 'message' => 'Already Scanned! Check-in denied. Attendee: ' . $attendee->name]);
            }

            // Mark as scanned
            DB::table('attendees')->where('id', $attendee->id)->update([
                'is_scanned' => true,
                'updated_at' => now(),
            ]);

            return response()->json([
            'success' => true,
            'message' => 'Check-in Successful for ' . $attendee->name . ' (' . $attendee->ticket_type . ')'
            ]);
        }
        );

        // Dashboard: add/edit sponsor via AJAX from admin modal
        Route::post('/dashboard/sponsor-save', function (Request $request) {
            $email = $request->input('email');
            if ($email && !EmailVerifier::verify($email)) {
                return response()->json(['success' => false, 'message' => "This email doesn't exist."]);
            }

            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('sponsors', 'public');
            }

            $id = $request->input('id');
            $isEdit = (bool)$id;
            $companyName = $request->input('company_name', 'A sponsor');

            if ($isEdit) {
                // Edit existing
                $update = [
                    'company_name' => $request->input('company_name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'level' => $request->input('level'),
                    'updated_at' => now(),
                ];
                if ($logoPath)
                    $update['logo_path'] = $logoPath;
                DB::table('sponsors')->where('id', $id)->update($update);
                // Log edit notification
                DB::table('notifications')->insert(['type' => 'sponsor', 'action' => 'edited', 'message' => 'Admin edited sponsor: ' . $companyName, 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
            }
            else {
                // New entry
                $id = DB::table('sponsors')->insertGetId([
                    'company_name' => $request->input('company_name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'logo_path' => $logoPath,
                    'level' => $request->input('level'),
                    'is_posted' => false,
                    'source' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                // Log add notification
                DB::table('notifications')->insert(['type' => 'sponsor', 'action' => 'added', 'message' => 'Admin added sponsor: ' . $companyName, 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
            }

            $sp = DB::table('sponsors')->find($id);
            $logoUrl = $sp->logo_path ? asset('storage/' . $sp->logo_path) : '';
            return response()->json(['success' => true, 'id' => $id, 'logo_url' => $logoUrl]);
        }
        );

        Route::post('/dashboard/sponsor-delete', function (Request $request) {
            $sponsor = DB::table('sponsors')->find($request->input('id'));
            if ($sponsor) {
                if ($sponsor->logo_path) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($sponsor->logo_path);
                }
                // Log delete notification before removing
                DB::table('notifications')->insert(['type' => 'sponsor', 'action' => 'deleted', 'message' => 'Admin deleted sponsor: ' . ($sponsor->company_name ?? 'Unknown'), 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
                DB::table('sponsors')->where('id', $request->input('id'))->delete();
            }
            return response()->json(['success' => true]);
        }
        );

        Route::post('/dashboard/sponsor-toggle-post', function (Request $request) {
            if (!$request->input('id'))
                return response()->json(['success' => false]);
            $sponsor = DB::table('sponsors')->find($request->input('id'));
            if ($sponsor) {
                $newState = !$sponsor->is_posted;
                DB::table('sponsors')->where('id', $request->input('id'))->update(['is_posted' => $newState]);
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        }
        );

        Route::post('/dashboard/partner-toggle-post', function (Request $request) {
            if (!$request->input('id'))
                return response()->json(['success' => false]);
            $partner = DB::table('partners')->find($request->input('id'));
            if ($partner) {
                $newState = !$partner->is_posted;
                DB::table('partners')->where('id', $request->input('id'))->update(['is_posted' => $newState]);
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        }
        );

        Route::post('/dashboard/partner-save', function (Request $request) {
            $email = $request->input('email');
            if ($email && !EmailVerifier::verify($email)) {
                return response()->json(['success' => false, 'message' => "This email doesn't exist."]);
            }

            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('partners', 'public');
            }

            $id = $request->input('id');
            $isEdit = (bool)$id;
            $companyName = $request->input('company_name', 'A partner');

            if ($isEdit) {
                // Edit existing
                $update = [
                    'company_name' => $request->input('company_name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'updated_at' => now(),
                ];
                if ($logoPath) {
                    $update['logo_path'] = $logoPath;
                }
                DB::table('partners')->where('id', $id)->update($update);
                // Log edit notification
                DB::table('notifications')->insert(['type' => 'partner', 'action' => 'edited', 'message' => 'Admin edited partner: ' . $companyName, 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
            }
            else {
                // New entry
                $id = DB::table('partners')->insertGetId([
                    'company_name' => $request->input('company_name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'logo_path' => $logoPath,
                    'is_posted' => false,
                    'source' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                // Log add notification
                DB::table('notifications')->insert(['type' => 'partner', 'action' => 'added', 'message' => 'Admin added partner: ' . $companyName, 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
            }

            $partner = DB::table('partners')->find($id);
            $logoUrl = $partner->logo_path ? asset('storage/' . $partner->logo_path) : '';

            return response()->json(['success' => true, 'id' => $id, 'logo_url' => $logoUrl]);
        }
        );

        Route::post('/dashboard/partner-delete', function (Request $request) {
            $partner = DB::table('partners')->find($request->input('id'));
            if ($partner) {
                if (isset($partner->logo_path) && $partner->logo_path) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($partner->logo_path);
                }
                // Log delete notification before removing
                DB::table('notifications')->insert(['type' => 'partner', 'action' => 'deleted', 'message' => 'Admin deleted partner: ' . ($partner->company_name ?? 'Unknown'), 'is_read' => false, 'created_at' => now(), 'updated_at' => now()]);
                DB::table('partners')->where('id', $request->input('id'))->delete();
            }
            return response()->json(['success' => true]);
        }
        );

        Route::post('/dashboard/settings-save', function (Request $request) {
            $creds = getAdminCredentials();

            if (!\Illuminate\Support\Facades\Hash::check($request->input('current_password'), $creds['password'])) {
                return response()->json(['success' => false, 'message' => 'Incorrect current password.']);
            }

            $newEmail = $request->input('email');
            $newPassword = $request->input('new_password');

            if (empty($newPassword)) {
                file_put_contents(storage_path('app/admin.json'), json_encode([
                    'email' => $newEmail,
                    'password' => $creds['password']
                ]));
            }
            else {
                saveAdminCredentials($newEmail, $newPassword);
            }

            return response()->json(['success' => true]);
        }
        );

        Route::post('/dashboard/send-broadcast', function (Request $request) {
            $audience = $request->input('audience', 'all');
            $subject = $request->input('subject');
            $body = $request->input('body');
            $attachmentPath = null;
            $headerImagePath = null;
            $footerImagePath = null;

            if ($request->hasFile('attachment')) {
                $attachmentPath = $request->file('attachment')->store('broadcasts', 'public');
            }
            if ($request->hasFile('header_image')) {
                $headerImagePath = $request->file('header_image')->store('broadcasts/images', 'public');
            }
            if ($request->hasFile('footer_image')) {
                $footerImagePath = $request->file('footer_image')->store('broadcasts/images', 'public');
            }

            $emails = [];
            if ($audience === 'sponsors' || $audience === 'all') {
                $emails = array_merge($emails, DB::table('sponsors')->whereNotNull('email')->pluck('email')->toArray());
            }
            if ($audience === 'partners' || $audience === 'all') {
                $emails = array_merge($emails, DB::table('partners')->whereNotNull('email')->pluck('email')->toArray());
            }
            if ($audience === 'feedback' || $audience === 'all') {
                $emails = array_merge($emails, DB::table('wp_wennovate_feedback')->whereNotNull('email')->pluck('email')->toArray());
            }
            if ($audience === 'ticket' || $audience === 'all') {
                $emails = array_merge($emails, DB::table('attendees')->whereNotNull('email')->pluck('email')->toArray());
            }
            if ($audience === 'all') {
                $emails = array_merge($emails, DB::table('subscribers')->whereNotNull('email')->pluck('email')->toArray());
            }

            $emails = array_unique(array_filter($emails));

            $sentCount = 0;
            $failCount = 0;
            $lastError = '';

            if (count($emails) > 0) {
                $emailData = [
                    'bodyText' => preg_replace('/\r|\n/', '<br>', htmlspecialchars($body)),
                    'headerImgPath' => $headerImagePath ? storage_path('app/public/' . $headerImagePath) : null,
                    'footerImgPath' => $footerImagePath ? storage_path('app/public/' . $footerImagePath) : null
                ];

                foreach ($emails as $email) {
                    try {
                        Mail::send('emails.broadcast', $emailData, function ($message) use ($email, $subject, $attachmentPath) {
                            $message->to($email)->subject($subject);
                            if ($attachmentPath) {
                                $message->attach(storage_path('app/public/' . $attachmentPath));
                            }
                        });
                        $sentCount++;
                    }
                    catch (\Exception $e) {
                        $failCount++;
                        $lastError = $e->getMessage();
                    }
                }
            }

            $broadcastId = DB::table('broadcasts')->insertGetId([
                'audience' => $audience,
                'subject' => $subject,
                'body' => $body,
                'attachment_path' => $attachmentPath,
                'header_image_path' => $headerImagePath,
                'footer_image_path' => $footerImagePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'sent_count' => $sentCount,
                'fail_count' => $failCount,
                'last_error' => $lastError,
                'broadcast' => [
                    'id' => $broadcastId,
                    'audience' => strtoupper($audience),
                    'subject' => $subject,
                    'body' => preg_replace('/\r|\n/', '\n', $body),
                    'date' => now()->format('M d, Y H:i'),
                    'attachment' => $attachmentPath ? ['name' => 'Attachment', 'url' => asset('storage/' . $attachmentPath)] : null,
                    'header_image' => $headerImagePath ? asset('storage/' . $headerImagePath) : null,
                    'footer_image' => $footerImagePath ? asset('storage/' . $footerImagePath) : null
                ]
            ]);
        });

                        // Mark all notifications as read
                        Route::post('/dashboard/notifications-mark-read', function () {
            DB::table('notifications')->where('is_read', false)->update(['is_read' => true, 'updated_at' => now()]);
            return redirect('/dashboard');
        }
        );
    });

// ─── OTHER PAGES ─────────────────────────────────────────────────────────────
Route::get('/past-event-1', function () {
    return view('pages.past-event-1');
});
Route::get('/past-event-2', function () {
    return view('pages.past-event-2');
});
Route::get('/register', function () {
    return view('pages.register');
});

// ─── CHAPA PAYMENT ───────────────────────────────────────────────────────────
Route::post('/chapa/pay', function (Request $request) {
    $secretKey = env('CHAPA_SECRET_KEY');
    $amount = $request->input('amount');
    $attendees = $request->input('attendees', []);
    $firstAttendee = $attendees[0] ?? null;

    // Verify all attendee emails before proceeding
    foreach ($attendees as $a) {
        $email = $a['email'] ?? '';
        if ($email && !EmailVerifier::verify($email)) {
            return response()->json([
                'success' => false,
                'message' => "The email '$email' doesn't exist."
            ], 400);
        }
    }

    // Generate a unique transaction reference
    $txRef = 'WEN-' . strtoupper(uniqid()) . '-' . time();

    // Save booking to DB as pending
    $bookingId = DB::table('bookings')->insertGetId([
        'tx_ref' => $txRef,
        'total_usd' => $request->input('total_usd', 0),
        'qty' => $request->input('tickets_qty', 0),
        'status' => 'pending',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    foreach ($attendees as $a) {
        $photoPath = '';
        if (!empty($a['photo']) && preg_match('/^data:image\/(\w+);base64,/', $a['photo'], $type)) {
            $data = substr($a['photo'], strpos($a['photo'], ',') + 1);
            $typeStr = strtolower($type[1]);
            $decodedData = base64_decode($data);
            $filename = 'attendees/' . uniqid() . '.' . $typeStr;
            \Illuminate\Support\Facades\Storage::disk('public')->put($filename, $decodedData);
            $photoPath = $filename;
        }

        DB::table('attendees')->insert([
            'booking_id' => $bookingId,
            'name' => $a['name'] ?? 'Unknown',
            'email' => $a['email'] ?? '',
            'phone' => $a['phone'] ?? '',
            'company_name' => $a['company'] ?? '',
            'position' => $a['position'] ?? '',
            'ticket_type' => $a['ticket'] ?? '',
            'photo_path' => $photoPath,
            'is_approved' => false,
            'is_scanned' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    $postData = [
        'amount' => $amount,
        'currency' => 'ETB',
        'email' => $firstAttendee['email'] ?? 'guest@wennovate.com',
        'first_name' => explode(' ', $firstAttendee['name'] ?? 'Guest')[0],
        'last_name' => explode(' ', $firstAttendee['name'] ?? 'Guest')[1] ?? '',
        'tx_ref' => $txRef,
        'callback_url' => url('/chapa/callback'),
        'return_url' => url('/chapa/callback') . '?tx_ref=' . $txRef,
        'customization[title]' => 'Wennovate Summit Ticket',
        'customization[description]' => 'Payment for ' . $request->input('tickets_qty', 1) . ' ticket(s)',
    ];

    // Initialize transaction via Chapa API
    $ch = curl_init('https://api.chapa.co/v1/transaction/initialize');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $secretKey,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $result = json_decode($response, true);

    if ($result && isset($result['status']) && $result['status'] === 'success' && isset($result['data']['checkout_url'])) {
        return response()->json([
        'success' => true,
        'checkout_url' => $result['data']['checkout_url'],
        'tx_ref' => $txRef,
        ]);
    }

    return response()->json([
    'success' => false,
    'message' => $result['message'] ?? 'Failed to initialize payment. Please try again.',
    ], 400);
});

Route::get('/chapa/callback', function (Request $request) {
    $txRef = $request->query('tx_ref', '');

    if ($txRef) {
        // Verify payment using Chapa API
        $secretKey = env('CHAPA_SECRET_KEY');
        $ch = curl_init('https://api.chapa.co/v1/transaction/verify/' . $txRef);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $secretKey,
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        if ($result && isset($result['status']) && $result['status'] === 'success') {
            $booking = DB::table('bookings')->where('tx_ref', $txRef)->first();

            if ($booking && $booking->status !== 'paid') {
                DB::table('bookings')->where('tx_ref', $txRef)->update(['status' => 'paid']);

                // Send notification to admin
                DB::table('notifications')->insert([
                    'type' => 'partner', // Reusing the 'partner' type for the 'fa-users' icon styling
                    'action' => 'booking',
                    'message' => 'New ticket booking completed (TX: ' . $txRef . ')',
                    'is_read' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

            // NOTE: Do NOT auto-approve here.
            // Attendees remain is_approved=false until admin manually approves
            // each one from the dashboard, which then sends the QR email.
            }
        }
    }

    return view('pages.payment-success', ['tx_ref' => $txRef]);
});

Route::post('/subscribe-submit', function (Request $request) {
    $email = $request->input('email');
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return response()->json(['success' => false, 'message' => 'Please provide a valid email.']);
    }

    if (!EmailVerifier::verify($email)) {
        return response()->json(['success' => false, 'message' => "This email doesn't exist."]);
    }

    $exists = DB::table('subscribers')->where('email', $email)->exists();
    if ($exists) {
        return response()->json(['success' => false, 'message' => 'This email is already subscribed.']);
    }

    DB::table('subscribers')->insert([
        'email' => $email,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('notifications')->insert([
        'type' => 'partner',
        'action' => 'subscribed',
        'message' => 'New newsletter subscriber: ' . $email,
        'is_read' => false,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return response()->json(['success' => true, 'message' => 'Thank you for subscribing!']);
});

Route::get('/ubora-challenge', function () {
    return view('pages.ubora-challenge');
});

Route::get('/agenda', function () {
    return view('pages.agenda');
});

Route::get('/what-to-expect', function () {
    return view('pages.what-to-expect');
});
