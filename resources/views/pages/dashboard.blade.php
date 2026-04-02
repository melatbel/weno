
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wennovate | Premier Admin</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #E6C200; 
            --sidebar-color: rgba(2, 6, 23, 0.96); 
            --p-blue: #3b82f6;
            --p-purple: #a855f7;
            --p-green: #22c55e;
            --p-yellow: #eab308;
            
            /* Light Mode Defaults */
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border-color: #f1f5f9;
            --input-bg: #fdfdfd;
        }

        /* Dark Mode Overrides */
        body.dark-mode {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border-color: #334155;
            --input-bg: #020617;
        }

        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg-body); color: var(--text-main); transition: background 0.3s, color 0.3s; }

        /* --- SIDEBAR (NO TOUCH) --- */
        .sidebar { 
            width: 300px; height: calc(100vh - 40px); 
            background: var(--sidebar-color); position: fixed; left: 20px; top: 20px; 
            border-radius: 40px; padding: 50px 20px; z-index: 1000; 
            display: flex; flex-direction: column;
            box-shadow: 0 40px 100px -20px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(40px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.08);
            overflow-y: auto; overflow-x: hidden;
        }
        .sidebar::-webkit-scrollbar { width: 6px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.1); border-radius: 10px; }
        body.dark-mode .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); }
        .bouncing-icon { animation: iconBounce 2s infinite ease-in-out; }
        @keyframes iconBounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
        .advanced-text { background: linear-gradient(to bottom right, #fff 30%, rgba(255,255,255,0.4)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 900; }
        
        .nav-link { display: flex; align-items: center; gap: 18px; padding: 18px 24px; color: rgba(255, 255, 255, 0.5); text-decoration: none; font-weight: 800; font-size: 1.15rem; border-radius: 24px; margin-bottom: 12px; cursor: pointer; transition: 0.4s; position: relative; }
        .nav-link:hover { color: #fff; background: rgba(255, 255, 255, 0.08); }
        .nav-link.active { background: var(--primary) !important; color: #000 !important; transform: scale(1.05); }
        .nav-link.active::after { content: ""; position: absolute; right: 20px; width: 10px; height: 10px; background: #000; border-radius: 50%; animation: pulse-dot 2s infinite; }

        /* --- MAIN CONTENT --- */
        /* ADJUSTED: Increased top padding to 110px to prevent overlap with Admin Header */
        .main-content { margin-left: 340px; padding: 110px 60px 40px 60px; position: relative;}
        .dashboard-title { font-family: 'Inter', sans-serif; font-size: 1.8rem; font-weight: 900; letter-spacing: -0.5px; text-transform: uppercase; line-height: 1; color: var(--text-main); }
        
        /* UPDATED: Enhanced Dashboard Bento Cards with Theme Support */
        #dashboard .bento-card { 
            background: var(--bg-card); 
            box-shadow: 0 20px 40px -15px rgba(0,0,0,0.1), 0 0 0 1px rgba(255,255,255,0.05);
            border-radius: 35px; 
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        #dashboard .bento-card h2, #dashboard .bento-card h4, #dashboard .bento-card span, #dashboard .bento-card h6 { color: var(--text-main); }
        #dashboard .bento-card span.text-slate-400 { color: var(--text-muted) !important; }

        #dashboard .bento-card::after {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(to bottom right, rgba(255,255,255,0), rgba(230, 194, 0, 0.05));
            opacity: 0; transition: 0.4s;
        }
        #dashboard .bento-card:hover { transform: translateY(-5px); box-shadow: 0 30px 60px -15px rgba(0,0,0,0.2); }
        #dashboard .bento-card:hover::after { opacity: 1; }

        .section { display: none; }
        .section.active { display: block; animation: smoothIn 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
        @keyframes smoothIn { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }

        /* --- BOOKING --- */
        .booking-shell { background: var(--bg-card); border-radius: 50px; border: 1px solid var(--border-color); padding: 45px; }
        
        /* ADJUSTED: Grid columns modified to give more space to Date and Actions */
        .booking-header-labels { display: grid; grid-template-columns: 2.5fr 1.5fr 1.5fr 1.5fr; padding: 0 40px 15px 40px; font-weight: 900; text-transform: uppercase; font-size: 0.75rem; color: var(--text-muted); letter-spacing: 1px; gap: 15px; }
        .booking-card { background: var(--bg-card); border-radius: 30px; margin-bottom: 15px; padding: 28px 40px; display: grid; grid-template-columns: 2.5fr 1.5fr 1.5fr 1.5fr; align-items: center; border: 2px solid var(--border-color); transition: 0.4s; color: var(--text-main); gap: 15px; cursor: pointer; }
        .booking-card:hover { border-color: var(--primary); transform: translateY(-2px); box-shadow: 0 10px 20px -5px rgba(0,0,0,0.05); }
        
        .booking-card span, .booking-card div { color: var(--text-main); }
        .booking-card .text-slate-400 { color: var(--text-muted) !important; }
        
        /* --- FEEDBACK GRID OVERRIDE --- */
        .feedback-grid { display: grid; grid-template-columns: 2fr 2fr 2fr 3fr 1.5fr; }

        /* --- PARTNER STYLES --- */
        .partner-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 25px; }
        .partner-card { background: var(--bg-card); border-radius: 40px; padding: 35px; border: 2px solid var(--border-color); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); position: relative; overflow: hidden; color: var(--text-main); }
        .partner-card:hover { transform: translateY(-10px); box-shadow: 0 30px 60px -15px rgba(0,0,0,0.1); border-color: var(--primary); }
        .partner-card h3 { color: var(--text-main); }
        .card-actions { position: absolute; top: 25px; right: 25px; display: flex; gap: 10px; opacity: 0; transition: 0.3s; }
        .partner-card:hover .card-actions { opacity: 1; }
        .action-btn { width: 35px; height: 35px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; transition: 0.2s; cursor: pointer; }
        .edit-btn { background: var(--border-color); color: var(--text-muted); } .edit-btn:hover { background: var(--primary); color: black; }
        .delete-btn { background: rgba(239, 68, 68, 0.1); color: #ef4444; } .delete-btn:hover { background: #ef4444; color: white; }

        /* General Utilities */
        .btn-action { font-weight: 900; padding: 14px 28px; border-radius: 20px; font-size: 0.8rem; text-transform: uppercase; display: flex; align-items: center; gap: 8px;}
        .filter-container { background: var(--border-color); padding: 8px; border-radius: 25px; display: inline-flex; gap: 4px; margin-bottom: 20px; }
        .filter-btn { padding: 12px 28px; border-radius: 20px; font-weight: 800; font-size: 0.85rem; color: var(--text-muted); border: none; background: transparent; }
        .filter-btn.active { background: #000; color: #fff; }
        /* Dark mode adjustment for filter btn */
        body.dark-mode .filter-btn.active { background: #fff; color: #000; }

        .profile-icon { width: 45px; height: 45px; background: var(--border-color); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-weight: 900; color: var(--text-main); font-size: 1.1rem; border: 2px solid var(--border-color); }
        .status-pill { padding: 12px 24px; border-radius: 18px; font-weight: 900; font-size: 0.8rem; text-transform: uppercase; display: inline-block; border: 2px solid transparent; }
        .status-blue { background: rgba(59, 130, 246, 0.1); color: var(--p-blue); border-color: var(--p-blue); }
        .status-purple { background: rgba(168, 85, 247, 0.1); color: var(--p-purple); border-color: var(--p-purple); }
        .status-green { background: rgba(34, 197, 94, 0.1); color: var(--p-green); border-color: var(--p-green); }
        .status-yellow { background: rgba(234, 179, 8, 0.1); color: var(--p-yellow); border-color: var(--p-yellow); }
        .pg-btn { width: 55px; height: 55px; border-radius: 18px; border: 1px solid var(--border-color); display: flex; align-items: center; justify-content: center; background: var(--bg-card); color: var(--text-main); transition: 0.4s; }

        /* --- COMPACT INTERACTIVE NEWSLETTER --- */
        .news-composer { background: var(--bg-card); border-radius: 35px; border: 1px solid var(--border-color); box-shadow: 0 15px 35px -12px rgba(0,0,0,0.05); }
        .news-input-field { border: 2px solid var(--border-color); border-radius: 18px; padding: 15px; font-weight: 700; width: 100%; transition: 0.3s; outline: none; background: var(--input-bg); font-size: 0.9rem; color: var(--text-main); }
        .news-input-field:focus { border-color: var(--primary); background: var(--bg-card); }
        .stat-badge { background: var(--bg-card); border: 1px solid var(--border-color); padding: 20px; border-radius: 30px; transition: 0.3s; color: var(--text-main); }
        .stat-badge h2, .stat-badge h4 { color: var(--text-main); }
        
        .dynamic-tag { background: var(--border-color); color: var(--text-main); padding: 5px 12px; border-radius: 10px; font-size: 0.7rem; font-weight: 800; cursor: pointer; transition: 0.2s; border: 1px solid transparent; }
        .dynamic-tag:hover { background: #000; color: #fff; transform: translateY(-2px); }
        
        #sendBroadcastBtn { transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        #sendBroadcastBtn:active { transform: scale(0.95); }
        .success-state { background: #22c55e !important; color: white !important; }

        /* Newsletter History Styles */
        .history-item { padding: 15px; border-radius: 20px; background: var(--bg-body); border: 1px solid var(--border-color); cursor: pointer; transition: 0.2s; color: var(--text-main); }
        .history-item:hover { background: var(--bg-card); border-color: var(--primary); box-shadow: 0 10px 20px -10px rgba(0,0,0,0.05); }
        
        /* ADJUSTED: Top Nav Container for Spacing */
        .top-nav { position: absolute; top: 35px; right: 60px; display: flex; align-items: center; gap: 20px; z-index: 100; }

        .theme-toggle { background: var(--bg-card); border: 2px solid var(--border-color); width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--text-main); transition: 0.3s; }
        .theme-toggle:hover { border-color: var(--primary); }

        /* --- NOTIFICATION BELL --- */
        .notif-wrapper { position: relative; }
        .notif-btn { background: var(--bg-card); border: 2px solid var(--border-color); width: 50px; height: 50px; border-radius: 16px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: var(--text-main); transition: 0.3s; position: relative; }
        .notif-btn:hover { border-color: var(--primary); }
        .notif-badge { position: absolute; top: -6px; right: -6px; background: #ef4444; color: #fff; font-size: 0.65rem; font-weight: 900; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid var(--bg-body); animation: pulse-badge 2s infinite; }
        @keyframes pulse-badge { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.2); } }
        .notif-dropdown { position: absolute; top: calc(100% + 12px); right: 0; width: 340px; background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 24px; box-shadow: 0 20px 50px -10px rgba(0,0,0,0.2); padding: 16px; display: none; z-index: 9999; }
        .notif-dropdown.open { display: block; animation: smoothIn 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
        .notif-header { font-size: 0.7rem; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); padding: 0 8px 10px 8px; border-bottom: 1px solid var(--border-color); margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; }
        .notif-scroll-area { max-height: 320px; overflow-y: auto; scrollbar-width: thin; }
        .notif-scroll-area::-webkit-scrollbar { width: 4px; } .notif-scroll-area::-webkit-scrollbar-thumb { background: var(--border-color); border-radius: 4px; }
        .notif-footer { border-top: 1px solid var(--border-color); margin-top: 10px; padding-top: 10px; text-align: center; }
        .notif-footer button { background: none; border: none; font-size: 0.75rem; font-weight: 800; color: var(--text-muted); cursor: pointer; transition: 0.2s; } .notif-footer button:hover { color: var(--primary); }
        .notif-item { display: flex; align-items: center; gap: 12px; padding: 10px 8px; border-radius: 14px; transition: 0.2s; cursor: default; }
        .notif-item:hover { background: var(--bg-body); }
        .notif-icon { width: 36px; height: 36px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; flex-shrink: 0; }
        .notif-item .notif-label { font-weight: 700; font-size: 0.82rem; color: var(--text-main); line-height: 1.3; }
        .notif-item .notif-time { font-size: 0.68rem; color: var(--text-muted); font-weight: 600; }
        .notif-empty { text-align: center; padding: 20px; color: var(--text-muted); font-size: 0.85rem; font-weight: 700; }
        /* Scrollable Recent Activity */
        .recent-activity-scroll { max-height: 280px; overflow-y: auto; scrollbar-width: thin; padding-right: 4px; }
        .recent-activity-scroll::-webkit-scrollbar { width: 4px; } .recent-activity-scroll::-webkit-scrollbar-thumb { background: var(--border-color); border-radius: 4px; }

        .admin-profile-top { display: flex; align-items: center; gap: 15px; }
        
        /* Modals in Dark Mode */
        body.dark-mode .bg-white { background-color: #1e293b !important; color: white !important; }
        body.dark-mode .bg-slate-50 { background-color: #0f172a !important; border-color: #334155 !important; }
        body.dark-mode #modalDetailMessage, body.dark-mode #historyBody, body.dark-mode #modalDetailSubject { color: #cbd5e1 !important; }

    </style>
</head>
<body class="">

<aside class="sidebar">
    <div class="flex items-center gap-3 mb-12 pl-2">
        <div class="w-[55px] h-[55px] bg-gradient-to-br from-[#E6C200] to-[#C5A300] rounded-[18px] flex items-center justify-center text-black text-2xl shadow-lg bouncing-icon"><i class="fas fa-wand-magic-sparkles"></i></div>
        <span class="text-3xl tracking-tighter advanced-text">Wennovate</span>
    </div>
    <nav>
        <div onclick="showSection('dashboard', this)" class="nav-link active"><i class="fas fa-chart-pie"></i> <span>Dashboard</span></div>
        <div onclick="showSection('booking', this)" class="nav-link"><i class="fas fa-ticket-alt"></i> <span>Booking</span></div>
        <div onclick="showSection('scanner', this)" class="nav-link"><i class="fas fa-qrcode"></i> <span>QR Scanner</span></div>
        <div onclick="showSection('sponsors', this)" class="nav-link"><i class="fas fa-handshake"></i> <span>Sponsors</span></div>
        <div onclick="showSection('partners', this)" class="nav-link"><i class="fas fa-handshake"></i> <span>Partners</span></div>
        <div onclick="showSection('subscribers', this)" class="nav-link"><i class="fas fa-users"></i> <span>Subscribers</span></div>
        <div onclick="showSection('newsletter', this)" class="nav-link"><i class="fas fa-paper-plane"></i> <span>Newsletter</span></div>
        <div onclick="showSection('feedback', this)" class="nav-link"><i class="fas fa-comment-alt"></i> <span>Feedback</span></div>
        <div onclick="showSection('settings', this)" class="nav-link mt-auto"><i class="fas fa-cog"></i> <span>Settings</span></div>
    </nav>
</aside>

<main class="main-content">
    
    <div class="top-nav">
        <div onclick="toggleTheme()" class="theme-toggle" id="themeIconBtn"><i class="fas fa-moon"></i></div>

        <!-- Notification Bell -->
        <div class="notif-wrapper">
            <div class="notif-btn" onclick="toggleNotifDropdown()">
                <i class="fas fa-bell"></i>
                @if($unpostedCount > 0)
                    <span class="notif-badge">{{ $unpostedCount > 9 ? '9+' : $unpostedCount }}</span>
                @endif
            </div>
            <div class="notif-dropdown" id="notifDropdown">
                <div class="notif-header">
                    <span>Notifications</span>
                    <span style="color: var(--text-main); font-size: 0.75rem;">{{ $unpostedCount }} unread</span>
                </div>
                <div class="notif-scroll-area">
                @if($notifItems->isEmpty())
                    <div class="notif-empty"><i class="fas fa-check-circle text-green-500 me-2"></i>All caught up!</div>
                @else
                    @foreach($notifItems as $notif)
                        @php
                            $iconMap = ['sponsor' => ['icon'=>'fa-handshake','bg'=>'rgba(245,158,11,0.12)','color'=>'#f59e0b'], 'partner' => ['icon'=>'fa-users','bg'=>'rgba(168,85,247,0.12)','color'=>'#a855f7'], 'feedback' => ['icon'=>'fa-comment-alt','bg'=>'rgba(34,197,94,0.12)','color'=>'#22c55e']];
                            $ic = $iconMap[$notif['type']] ?? ['icon'=>'fa-bell','bg'=>'rgba(100,116,139,0.12)','color'=>'#64748b'];
                        @endphp
                        <div class="notif-item">
                            <div class="notif-icon" style="background:{{ $ic['bg'] }}; color:{{ $ic['color'] }}"><i class="fas {{ $ic['icon'] }}"></i></div>
                            <div>
                                <div class="notif-label">{{ $notif['label'] }}</div>
                                <div class="notif-time">{{ \Carbon\Carbon::parse($notif['time'])->diffForHumans() }}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
                @if($unpostedCount > 0)
                <div class="notif-footer">
                    <form action="{{ url('/dashboard/notifications-mark-read') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit"><i class="fas fa-check-double me-1"></i> Mark all as read</button>
                    </form>
                </div>
                @endif
            </div>
        </div>

        <div class="admin-profile-top flex items-center gap-4">
            <div class="text-right">
                <h5 class="font-black text-lg mb-0" style="color: var(--text-main);">Admin</h5>
                <span class="text-xs font-bold text-slate-400">Super User</span>
            </div>
            
            <div class="relative profile-dropdown-container">
                <div class="profile-icon bg-[#E6C200] text-black !border-none !text-xl cursor-pointer shadow-md hover:scale-105 transition" onclick="document.getElementById('profileDropdown').classList.toggle('hidden')">A</div>
                
                <div id="profileDropdown" class="absolute right-0 mt-3 w-44 rounded-2xl shadow-2xl py-2 hidden z-[9999] top-full" style="background: var(--bg-card); border: 1px solid var(--border-color);">
                    <form action="{{ url('/logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="w-full text-left px-5 py-3 text-sm font-bold text-red-500 transition flex items-center gap-3 hover:opacity-75">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="dashboard" class="section active">
        <div class="mb-10">
            <h1 class="dashboard-title">Dashboard</h1>
            <div class="flex items-center gap-4 mt-2">
                <div class="h-[2px] w-8 bg-[#E6C200]"></div>
                <p class="text-slate-400 font-bold text-sm tracking-widest uppercase">Analytics <span class="text-slate-200 mx-2">•</span> Overview</p>
            </div>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-md-4"><div class="bento-card p-8"><span class="text-lg font-black uppercase block mb-3 text-slate-400">Revenue</span><h2 class="text-5xl font-black tracking-tight">ETB {{ number_format($totalRevenue, 2) }}</h2></div></div>
            <div class="col-md-4"><div class="bento-card p-8"><span class="text-lg font-black uppercase block mb-3 text-slate-400">Bookings</span><h2 class="text-5xl font-black tracking-tight">{{ number_format($totalBookings) }}</h2></div></div>
            <div class="col-md-4"><div class="bento-card p-8"><span class="text-lg font-black uppercase block mb-3 text-slate-400">Sponsors</span><h2 class="text-5xl font-black tracking-tight" id="sponsorCount">28</h2></div></div>
        </div>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bento-card p-10">
                    <h4 class="font-black text-xl mb-6">Ticket Sales Trend</h4>
                    <div style="height: 280px;"><canvas id="perfChart"></canvas></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bento-card p-10 h-full">
                    <h4 class="font-black text-xl mb-8">Recent Activity</h4>
                    <div class="space-y-5">
                        @forelse($recentActivities as $activity)
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl flex items-center justify-center" style="background: {{ $activity['color'] }}1a; color: {{ $activity['color'] }};">
                                    <i class="{{ $activity['icon'] }}"></i>
                                </div>
                                <div>
                                    <h6 class="font-black mb-0" style="font-size: 0.85rem;">{{ $activity['label'] }}</h6>
                                    <span class="text-[0.7rem] font-bold text-slate-400">{{ $activity['time'] }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-slate-400 text-sm font-bold italic text-center py-6">No recent activity yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="booking" class="section">
        <div class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="dashboard-title mb-4">Bookings</h1>
                <div class="filter-container">
                    <button onclick="setFilter('all', this)" class="filter-btn active">ALL</button>
                    <button onclick="setFilter('Day 1', this)" class="filter-btn">DAY 1</button>
                    <button onclick="setFilter('Day 2', this)" class="filter-btn">DAY 2</button>
                    <button onclick="setFilter('Day 3', this)" class="filter-btn">DAY 3</button>
                    <button onclick="setFilter('Full Pass', this)" class="filter-btn">FULL PASS</button>
                    <button onclick="setFilter('scanned', this)" class="filter-btn">SCANNED</button>
                    <button onclick="setFilter('not_scanned', this)" class="filter-btn">UNSCANNED</button>
                </div>
            </div>
            <div class="flex gap-3">
                 <button onclick="toggleBookingModal(true)" class="btn-action bg-[#E6C200] text-black hover:bg-[#FFD700] transition-all"><i class="fas fa-plus"></i> Add New</button>
                <button onclick="exportFilteredBookingPDF()" class="btn-action bg-black text-white hover:bg-slate-800 transition-all"><i class="fas fa-file-download"></i> PDF</button>
            </div>
        </div>
        <div class="booking-shell" id="bookingTableContainer">
            <div class="booking-header-labels">
                <div>Attendees</div><div style="margin-left: -20px;">Ticket Type</div><div style="margin-left: -40px;">Phone Number</div><div class="text-right">Actions</div>
            </div>
            <div id="bookingBody" class="min-h-[400px]"></div>
            <div class="flex justify-between items-center mt-10 px-4" id="bookingPaginationArea">
                <div id="pageInfo" class="bg-black text-white px-5 py-2 rounded-xl font-bold text-sm"></div>
                <div id="paginationControls" class="flex gap-3"></div>
            </div>
        </div>
        <div id="bookingPdfHidden" style="display: none;"></div>
    </div>

    <!-- QR Scanner Section -->
    <div id="scanner" class="section">
        <div class="mb-10 flex flex-col">
            <h1 class="dashboard-title mb-4">Event Check-In (QR Scanner)</h1>
            <div class="h-[2px] w-8 bg-[#E6C200]"></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="booking-shell p-8 text-center" style="max-width: 500px; margin: auto;">
                    <div id="qr-reader" style="width:100%; min-height: 350px;"></div>
                    <div id="qr-reader-results" class="mt-4 font-bold text-lg"></div>
                    <button id="start-scan-btn" onclick="startScanner()" class="btn-action bg-black text-white px-8 py-3 mt-5 w-full justify-center text-[0.85rem]"><i class="fas fa-camera mr-2"></i> Start Camera</button>
                    <button id="stop-scan-btn" onclick="stopScanner()" class="btn-action bg-red-500 text-white px-8 py-3 mt-3 w-full justify-center hidden text-[0.85rem]"><i class="fas fa-stop mr-2"></i> Stop Camera</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="booking-shell p-8 h-full">
                    <h4 class="font-black text-xl mb-4 text-slate-800">Scan Status</h4>
                    <div id="scan-status-icon" class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-2xl text-slate-400 mb-4 mx-auto">
                        <i class="fas fa-qrcode text-3xl"></i>
                    </div>
                    <p id="scan-status-message" class="text-center text-slate-500 font-bold mb-5">Waiting for QR scan...</p>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center text-sm border-b border-slate-100 pb-2">
                            <span class="font-black text-slate-400 uppercase tracking-widest text-[0.65rem]">Attendee Name</span>
                            <span id="scan-result-name" class="font-bold text-slate-800">-</span>
                        </div>
                        <div class="flex justify-between items-center text-sm border-b border-slate-100 pb-2">
                            <span class="font-black text-slate-400 uppercase tracking-widest text-[0.65rem]">Ticket Type</span>
                            <span id="scan-result-type" class="font-bold text-slate-800">-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sponsors" class="section">
        <div class="mb-10 flex justify-between items-end">
            <div><h1 class="dashboard-title mb-4">Sponsors</h1></div>
            <div class="flex gap-3">
                <button onclick="exportSponsorsPDF()" class="btn-action bg-black text-white hover:bg-slate-800 transition-all"><i class="fas fa-file-pdf"></i> PDF</button>
                <button onclick="togglePartnerModal(true, 'Sponsor')" class="btn-action bg-black text-white hover:bg-[#E6C200] hover:text-black transition-all"><i class="fas fa-plus"></i> Add New Sponsor</button>
            </div>
        </div>
        <div id="partnerGrid" class="partner-grid mb-6"></div>
        <div class="flex justify-between items-center mt-6 px-4" id="sponsorPaginationArea">
            <div id="sponsorPageInfo" class="bg-black text-white px-5 py-2 rounded-xl font-bold text-sm"></div>
            <div id="sponsorPaginationControls" class="flex gap-3"></div>
        </div>
    </div>

    <div id="partners" class="section">
        <div class="mb-10 flex justify-between items-end">
            <div><h1 class="dashboard-title mb-4">Partners</h1></div>
            <div class="flex gap-3">
                <button onclick="exportPartnersPDF()" class="btn-action bg-black text-white hover:bg-slate-800 transition-all"><i class="fas fa-file-pdf"></i> PDF</button>
                <button onclick="togglePartnerModal(true, 'Partner')" class="btn-action bg-[#E6C200] text-black hover:bg-[#FFD700] transition-all"><i class="fas fa-user-plus"></i> Add New Partner</button>
            </div>
        </div>
        <div id="actualPartnerGrid" class="partner-grid mb-6"></div>
        <div class="flex justify-between items-center mt-6 px-4" id="partnerPaginationArea">
            <div id="partnerPageInfo" class="bg-black text-white px-5 py-2 rounded-xl font-bold text-sm"></div>
            <div id="partnerPaginationControls" class="flex gap-3"></div>
        </div>
    </div>

    <div id="subscribers" class="section">
        <div class="mb-10 flex justify-between items-end">
            <div><h1 class="dashboard-title mb-4">Subscribers</h1>
                 <p class="text-slate-400 font-bold block mb-3 text-sm tracking-widest uppercase">Stay Updated Mailing List</p>
            </div>
            <div class="flex gap-3">
                <button onclick="exportSubscribersPDF()" class="btn-action bg-black text-white hover:bg-slate-800 transition-all"><i class="fas fa-file-pdf"></i> PDF</button>
                <button onclick="toggleSubscriberModal(true)" class="btn-action bg-[#E6C200] text-black hover:bg-[#FFD700] transition-all"><i class="fas fa-plus"></i> Add New Subscriber</button>
            </div>
        </div>
        <div class="booking-shell" id="subscribersPrintArea">
            <div class="booking-header-labels grid grid-cols-3 gap-4">
                <div>Email Address</div><div>Date Subscribed</div><div class="text-right">Action</div>
            </div>
            <div id="subscribersBody" class="min-h-[400px]"></div>
            <div class="flex justify-between items-center mt-10 px-4" id="subscriberPaginationArea">
                <div id="subscriberPageInfo" class="bg-black text-white px-5 py-2 rounded-xl font-bold text-sm"></div>
                <div id="subscriberPaginationControls" class="flex gap-3"></div>
            </div>
        </div>
    </div>

        <div id="partnerModal" class="fixed inset-0 z-[2000] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
            <div class="bg-white w-full max-w-md rounded-[35px] shadow-2xl p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 id="modalTitle" class="text-2xl font-black uppercase tracking-tighter text-black">New Entry</h2>
                    <button onclick="togglePartnerModal(false)" class="text-slate-400 hover:text-black transition"><i class="fas fa-times"></i></button>
                </div>
                <form id="addSponsorForm" class="space-y-3" enctype="multipart/form-data">
                    <input type="hidden" id="entryType">
                    <input type="hidden" id="editId" value="">

                    <!-- Sponsor fields (shown when type=Sponsor) -->
                    <div id="sponsorFields">
                        <input id="cName" type="text" placeholder="Company Name *" class="news-input-field !p-3 w-full mb-3" pattern="[A-Za-z\s]+" title="Company name should only contain letters and spaces" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                        <input id="pPhone" type="tel" placeholder="Phone Number" class="news-input-field !p-3 w-full mb-3" pattern="^(0\d{9}|\+251\s?\d{9})$" maxlength="14" title="Phone must be exactly format 0009090909 or +251 965879809" oninput="this.value = this.value.replace(/[^\+\s0-9]/g, '')">
                        <select id="pTier" class="news-input-field !p-3 appearance-none font-bold text-slate-600 w-full mb-3">
                            <option value="">Select Level *</option>
                            <option value="Platinum">Platinum</option>
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                        </select>
                        <input id="pEmail" type="email" placeholder="Email Address *" class="news-input-field !p-3 w-full mb-1" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address" onblur="verifyAdminEmail(this)">
                        <span class="email-error-msg text-red-500 text-xs font-bold hidden pl-2 mb-3 block"></span>
                    </div>

                    <!-- Partner fields (shown when type=Partner) -->
                    <div id="partnerFields" class="hidden">
                        <input id="partnerCName" type="text" placeholder="Company Name *" class="news-input-field !p-3 w-full mb-3" pattern="[A-Za-z\s]+" title="Company name should only contain letters and spaces" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                        <input id="partnerEmail" type="email" placeholder="Email Address *" class="news-input-field !p-3 w-full mb-1" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address" onblur="verifyAdminEmail(this)">
                        <span class="email-error-msg text-red-500 text-xs font-bold hidden pl-2 mb-3 block"></span>
                        <input id="partnerPhone" type="tel" placeholder="Contact Number" class="news-input-field !p-3 w-full mb-3" pattern="^(0\d{9}|\+251\s?\d{9})$" maxlength="14" title="Phone must be exactly format 0009090909 or +251 965879809" oninput="this.value = this.value.replace(/[^\+\s0-9]/g, '')">
                    </div>

                    <!-- Shared fields -->
                    <div class="mb-3">
                        <label class="block text-[0.65rem] font-black text-slate-400 uppercase tracking-widest mb-2">Company Logo *</label>
                        <input id="pLogo" type="file" accept="image/*" class="news-input-field !p-2 w-full">
                        <div id="logoPreviewContainer" class="mt-2 hidden">
                            <img id="logoPreview" src="" alt="Logo Preview" class="w-20 h-20 object-contain border rounded-xl">
                        </div>
                    </div>

                    <button type="button" id="saveEntryBtn" onclick="handleEntrySave()" class="w-full bg-[#E6C200] py-4 rounded-xl text-black font-black uppercase text-xs shadow-lg mt-4 transition-all hover:bg-[#FFD700] hover:scale-[1.02]">Save Entry</button>
                </form>
            </div>
        </div>

        <!-- SUBSCRIBER FORM MODAL -->
        <div id="subscriberModal" class="fixed inset-0 z-[2000] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
            <div class="bg-white w-full max-w-sm rounded-[35px] shadow-2xl p-8 transform transition-all scale-95 opacity-0" id="subscriberModalContent">
                <div class="flex justify-between items-start mb-2">
                    <div class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center mb-4">
                        <i class="fas fa-envelope-open-text text-xl"></i>
                    </div>
                    <button onclick="toggleSubscriberModal(false)" class="text-slate-400 hover:text-red-500 transition"><i class="fas fa-times text-xl"></i></button>
                </div>
                <h2 class="text-2xl font-black uppercase tracking-tighter text-black mb-1">Add Subscriber</h2>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-6">Manually enroll a new email</p>
                
                <form id="addSubscriberForm" class="space-y-4">
                    <div>
                        <input id="newSubscriberEmail" type="email" placeholder="Email Address *" class="news-input-field !p-4 w-full" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address">
                        <p id="subscriberErrorMsg" class="text-red-500 text-xs font-bold hidden mt-2 ml-2"></p>
                    </div>

                    <button type="submit" id="saveSubscriberBtn" class="w-full bg-black py-4 rounded-xl text-white font-black uppercase text-xs shadow-lg mt-2 transition-all hover:bg-[#E6C200] hover:text-black hover:scale-[1.02]">
                        <i class="fas fa-plus pr-2"></i> Add to List
                    </button>
                </form>
            </div>
        </div>

    <div id="newsletter" class="section">
        <div class="mb-8">
            <h1 class="dashboard-title mb-2">Broadcast Studio</h1>
            <div class="h-[2px] w-8 bg-[#E6C200]"></div>
        </div>
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="news-composer p-8">
                    <div class="space-y-5">
                        <div>
                            <label class="block font-black text-[0.65rem] text-slate-400 uppercase tracking-widest mb-3 ml-1">Target Audience</label>
                            <div class="filter-container !bg-slate-50 !p-1.5 w-full flex">
                                <button onclick="setNewsFilter('all', this)" class="filter-btn news-filter-btn active flex-1 !py-2 !text-[0.7rem]">ALL</button>
                                <button onclick="setNewsFilter('ticket', this)" class="filter-btn news-filter-btn flex-1 !py-2 !text-[0.7rem]">TICKET BUYERS</button>
                                <button onclick="setNewsFilter('sponsors', this)" class="filter-btn news-filter-btn flex-1 !py-2 !text-[0.7rem]">SPONSORS</button>
                                <button onclick="setNewsFilter('partners', this)" class="filter-btn news-filter-btn flex-1 !py-2 !text-[0.7rem]">PARTNERS</button>
                                <button onclick="setNewsFilter('feedback', this)" class="filter-btn news-filter-btn flex-1 !py-2 !text-[0.7rem]">FEEDBACK</button>
                            </div>
                        </div>
                        <input type="text" id="emailSubject" placeholder="Email Subject line..." class="news-input-field">
                        
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <label class="block font-black text-[0.65rem] text-slate-400 uppercase tracking-widest mb-2 ml-1">Header Image (Optional)</label>
                                <div class="relative">
                                    <input type="file" id="newsHeaderAttachment" accept="image/*" class="opacity-0 absolute inset-0 w-full h-full cursor-pointer z-10" onchange="handleHeaderSelect()">
                                    <div class="flex items-center gap-3 bg-slate-50 border border-slate-100 p-3 rounded-xl">
                                        <i class="fas fa-image text-slate-400 text-lg"></i>
                                        <span id="headerNameDisplay" class="text-sm font-bold text-slate-500 truncate">Choose Header...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-1">
                                <label class="block font-black text-[0.65rem] text-slate-400 uppercase tracking-widest mb-2 ml-1">Footer Image (Optional)</label>
                                <div class="relative">
                                    <input type="file" id="newsFooterAttachment" accept="image/*" class="opacity-0 absolute inset-0 w-full h-full cursor-pointer z-10" onchange="handleFooterSelect()">
                                    <div class="flex items-center gap-3 bg-slate-50 border border-slate-100 p-3 rounded-xl">
                                        <i class="fas fa-image text-slate-400 text-lg"></i>
                                        <span id="footerNameDisplay" class="text-sm font-bold text-slate-500 truncate">Choose Footer...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <textarea id="emailBody" placeholder="Compose your professional broadcast message..." class="news-input-field h-[280px] resize-none"></textarea>
                        
                        <div class="flex justify-between items-center pt-2">
                            <div class="flex items-center">
                                <input type="file" id="newsAttachment" class="hidden" onchange="handleFileSelect()">
                                <button onclick="document.getElementById('newsAttachment').click()" class="flex items-center gap-2 text-slate-400 font-bold hover:text-black transition-all px-4 py-2 rounded-xl bg-slate-50 border border-slate-100">
                                    <i class="fas fa-paperclip"></i> <span id="fileNameDisplay" class="text-[0.75rem]">File Attachment</span>
                                </button>
                            </div>
                            <button id="sendBroadcastBtn" onclick="sendNewsletter()" class="btn-action bg-black text-white px-10 py-4 hover:bg-[#E6C200] hover:text-black shadow-lg">
                                <i class="fas fa-bolt mr-2"></i> Send Broadcast Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="space-y-4">
                    <div class="stat-badge text-center">
                        <div class="w-12 h-12 bg-slate-900 text-white rounded-2xl flex items-center justify-center mx-auto mb-3"><i class="fas fa-users text-lg"></i></div>
                        <h2 class="text-4xl font-black tracking-tighter" id="recipientCount">{{ number_format($totalSubscribers ?? 0) }}</h2>
                        <p class="font-bold text-slate-400 uppercase tracking-widest text-[0.6rem] mt-2" id="recipientLabel">Subscribers Number</p>
                    </div>
                    
                    <div class="stat-badge">
                        <h4 class="font-black uppercase text-[0.65rem] tracking-widest text-slate-400 mb-5">Broadcast History</h4>
                        <div id="broadcastHistoryList" class="space-y-3 max-h-[300px] overflow-y-auto pr-2">
                            <p class="text-slate-400 text-sm font-bold italic text-center py-4">No broadcasts sent yet.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="feedback" class="section">
        <div class="mb-10 flex justify-between items-end">
            <div>
                <h1 class="dashboard-title mb-4">Feedback</h1>
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" id="feedbackSearch" onkeyup="renderFeedbackTable()" placeholder="Search name, email, or date..." class="news-input-field !pl-12 !py-2 !w-[400px]">
                </div>
            </div>
            <div class="flex gap-3">
                <button onclick="exportFeedbackPDF()" class="btn-action bg-black text-white"><i class="fas fa-file-pdf"></i> PDF</button>
            </div>
        </div>
        <div class="booking-shell" id="feedbackPrintArea">
            <div class="booking-header-labels feedback-grid">
                <div>User</div><div>Email</div><div>Subject</div><div>Message Preview</div><div class="text-right">Date</div>
            </div>
            <div id="feedbackBody" class="min-h-[400px]"></div>
            <div class="flex justify-between items-center mt-10 px-4" id="feedbackPaginationArea">
                <div id="feedbackPageInfo" class="bg-black text-white px-5 py-2 rounded-xl font-bold text-sm"></div>
                <div id="feedbackPaginationControls" class="flex gap-3"></div>
            </div>
        </div>
    </div>

    <div id="settings" class="section">
        <div class="mb-10 flex flex-col">
            <h1 class="dashboard-title mb-4">Account Settings</h1>
            <div class="h-[2px] w-8 bg-[#E6C200]"></div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="news-composer p-10">
                    <h4 class="font-black text-xl mb-6" style="color: var(--text-main);">Admin Credentials</h4>
                    <p class="text-sm font-bold text-slate-400 mb-8">Update your login email and password below.</p>
                    <form id="settingsForm" onsubmit="handleSettingsSave(event)">
                        <div class="mb-5">
                            <label class="block font-black text-[0.65rem] text-slate-400 uppercase tracking-widest mb-2 ml-1">Email Address</label>
                            <input type="email" id="set_email" value="{{ $adminEmail ?? 'admin@wennovate.com' }}" class="news-input-field !p-4" required>
                        </div>
                        <div class="mb-5">
                            <label class="block font-black text-[0.65rem] text-slate-400 uppercase tracking-widest mb-2 ml-1">New Password (leave blank to keep current)</label>
                            <div class="relative">
                                <input type="password" id="set_new_password" placeholder="••••••••" class="news-input-field !p-4 !pr-12">
                                <i class="fas fa-eye absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-black dark:hover:text-white cursor-pointer transition" onclick="togglePasswordState('set_new_password', this)"></i>
                            </div>
                        </div>
                        
                        <div class="h-[1px] w-full bg-slate-200 dark:bg-slate-700 my-8"></div>
                        
                        <div class="mb-8">
                            <label class="block font-black text-[0.65rem] text-slate-400 uppercase tracking-widest mb-2 ml-1">Current Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="password" id="set_current_password" placeholder="Required to save changes" class="news-input-field !p-4 !pr-12" required>
                                <i class="fas fa-eye absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-black dark:hover:text-white cursor-pointer transition" onclick="togglePasswordState('set_current_password', this)"></i>
                            </div>
                        </div>
                        
                        <button type="submit" id="saveSettingsBtn" class="btn-action w-full justify-center bg-black text-white py-4 hover:bg-[#E6C200] hover:text-black shadow-lg text-[0.8rem]">
                            <i class="fas fa-save mr-2"></i> Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<div id="receiptModal" class="fixed inset-0 z-[2000] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl relative" style="max-height:90vh; display:flex; flex-direction:column;">
        <!-- Scrollable content area -->
        <div id="receiptPrintArea" style="overflow-y:auto; flex:1;">
            <!-- X Close Button -->
            <button onclick="toggleReceiptModal(false)" class="hidden-on-print" style="position:absolute; top:16px; right:16px; background:#f1f5f9; border:none; width:36px; height:36px; border-radius:50%; font-size:1.1rem; cursor:pointer; display:flex; align-items:center; justify-content:center; color:#64748b; z-index:10;" title="Close">&times;</button>

            <!-- Receipt Header -->
            <div class="flex justify-between items-center p-8 border-b border-gray-100">
                <div class="flex items-center gap-2">
                    <svg width="120" height="40" viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.5 10.5C15.5 10.5 10.5 15.5 10.5 20.5C10.5 25.5 15.5 30.5 15.5 30.5" stroke="#77B700" stroke-width="4" stroke-linecap="round"/>
                        <path d="M22.5 10.5C22.5 10.5 27.5 15.5 27.5 20.5C27.5 25.5 22.5 30.5 22.5 30.5" stroke="#002A3C" stroke-width="4" stroke-linecap="round"/>
                        <text x="35" y="28" font-family="Arial, sans-serif" font-weight="bold" font-size="24" fill="#002A3C">Chapa</text>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-[#77B700] tracking-tight">RECEIPT</h1>
            </div>

            <div class="p-8">
                <!-- Info Grid -->
                <div class="grid grid-cols-2 gap-8 mb-8">
                    <div>
                        <h2 class="text-[#77B700] font-bold text-lg mb-2">Receipt From</h2>
                        <div class="text-sm font-bold text-[#002A3C]">Wennovate Summit</div>
                        <div class="text-xs text-gray-500 font-bold mt-1">TIN: 1234567890</div>
                        <div class="text-xs text-gray-500 font-bold">Phone No. 0911223344</div>
                        <div class="text-xs text-gray-500 font-bold">Address Addis Ababa, Ethiopia</div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-bold text-[#002A3C]">Chapa Financial Technologies S.C</div>
                        <div class="text-xs text-gray-500 font-bold mt-1">TIN 0071406415</div>
                        <div class="text-xs text-gray-500 font-bold">VAT Reg. 18595770010</div>
                        <div class="text-xs text-gray-500 font-bold">Phone No. +251-960724272</div>
                        <div class="text-xs text-gray-500 font-bold">Website chapa.co</div>
                    </div>
                </div>

                <!-- Payment Details Banner -->
                <div class="flex items-center mb-6">
                    <div class="bg-[#77B700] text-white font-bold py-2 px-6 flex-1 text-sm tracking-wider">
                        PAYMENT DETAILS
                    </div>
                    <div class="bg-[#002A3C] text-white py-2 px-6 text-sm font-bold ml-1" id="receiptIdBox">
                        RCAPToHExKKt7D0
                    </div>
                </div>

                <!-- Details Table -->
                <div class="space-y-0.5" id="receiptDetailsTable">
                    <!-- Dynamic Content -->
                </div>

                <!-- Totals -->
                <div class="mt-8 flex flex-col items-end gap-1 px-4">
                    <div class="flex justify-between w-64 text-xs font-bold text-gray-500">
                        <span>Sub Total</span>
                        <span id="receiptSubTotal">0.00 ETB</span>
                    </div>
                    <div class="flex justify-between w-64 text-xs font-bold text-gray-500">
                        <span>Charge (2.5%)</span>
                        <span id="receiptCharge">0.00 ETB</span>
                    </div>
                    <div class="flex justify-between w-64 text-base font-bold text-[#002A3C] border-t border-gray-100 pt-2 mt-1">
                        <span>Total</span>
                        <span id="receiptTotal">0.00 ETB</span>
                    </div>
                </div>

                <!-- References -->
                <div class="mt-12">
                    <h3 class="text-[#77B700] font-bold text-sm mb-2">References</h3>
                    <div class="text-xs font-bold text-gray-500">Chapa: <span id="receiptChapaRef">RCAPToHExKKt7D0</span></div>
                </div>
            </div>
        </div>

        <!-- Action Buttons (Hidden on print / PDF export) -->
        <div class="p-6 border-t border-gray-100 flex justify-center gap-4 hidden-on-print" style="flex-shrink:0;">
            <button onclick="downloadReceipt()" class="bg-[#002A3C] text-white px-8 py-3 rounded-xl font-bold hover:opacity-90 transition shadow-lg flex items-center gap-2">
                <i class="fas fa-download"></i> Download PDF
            </button>
            <button onclick="toggleReceiptModal(false)" class="bg-gray-100 text-gray-600 px-8 py-3 rounded-xl font-bold hover:bg-gray-200 transition">
                Close
            </button>
        </div>
    </div>
</div>

<style>
@media print {
    body * { visibility: hidden; }
    #receiptPrintArea, #receiptPrintArea * { visibility: visible; }
    #receiptPrintArea { position: absolute; left: 0; top: 0; width: 100%; box-shadow: none; border-radius: 0; padding: 20px; }
    .hidden-on-print { display: none !important; }
}
</style>

<div id="bookingModal" class="fixed inset-0 z-[2000] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white w-full max-w-md rounded-[35px] shadow-2xl p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 id="bookingModalTitle" class="text-2xl font-black uppercase tracking-tighter text-black">New Booking</h2>
            <button onclick="toggleBookingModal(false)" class="text-slate-400 hover:text-black transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="addBookingForm" class="space-y-3">
            <input type="hidden" id="bookingEditIndex" value="-1">
            <div>
                <input id="bName" type="text" placeholder="Full Name" required class="news-input-field !p-3" pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                <span id="bNameError" class="text-red-500 text-xs font-bold hidden pl-2"></span>
            </div>
            <div>
                <input id="bEmail" type="email" placeholder="Email Address" required class="news-input-field !p-3 w-full" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address" onblur="verifyAdminEmail(this)">
                <span id="bEmailError" class="email-error-msg text-red-500 text-xs font-bold hidden pl-2 block"></span>
            </div>
            <select id="bType" class="news-input-field !p-3 appearance-none font-bold text-slate-600">
                <option value="Full Pass">Full Pass</option>
                <option value="Day 1">Day 1</option>
                <option value="Day 2">Day 2</option>
                <option value="Day 3">Day 3</option>
            </select>
            <div>
                <input id="bPhone" type="tel" placeholder="Phone Number" required class="news-input-field !p-3 w-full" pattern="^(0\d{9}|\+251\s?\d{9})$" maxlength="14" title="Phone must be exactly format 0009090909 or +251 965879809" oninput="this.value = this.value.replace(/[^\+\s0-9]/g, '')">
                <span id="bPhoneError" class="text-red-500 text-xs font-bold hidden pl-2"></span>
            </div>
            <div>
                <input id="bCompany" type="text" placeholder="Company Name" class="news-input-field !p-3 w-full">
            </div>
            <div>
                <input id="bPosition" type="text" placeholder="Position" class="news-input-field !p-3 w-full">
            </div>
            <button type="button" onclick="handleBookingSave()" class="w-full bg-[#E6C200] py-4 rounded-xl text-black font-black uppercase text-xs shadow-lg mt-4">Save Booking</button>
        </form>
    </div>
</div>

<div id="feedbackModal" class="fixed inset-0 z-[2000] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white w-full max-w-2xl rounded-[35px] shadow-2xl p-10">
        <div class="flex justify-between items-start mb-8">
            <div class="flex items-center gap-4">
                <div id="modalDetailIcon" class="w-16 h-16 bg-[#E6C200] rounded-2xl flex items-center justify-center text-2xl font-black text-black"></div>
                <div>
                    <h2 id="modalDetailName" class="text-2xl font-black tracking-tighter mb-0 text-black"></h2>
                    <p id="modalDetailEmail" class="text-slate-400 font-bold"></p>
                </div>
            </div>
            <button onclick="closeFeedbackModal()" class="text-slate-400 hover:text-black transition text-2xl"><i class="fas fa-times"></i></button>
        </div>
        <div class="space-y-6">
            <div>
                <span class="block text-[0.65rem] font-black text-slate-400 uppercase tracking-widest mb-1">Subject</span>
                <p id="modalDetailSubject" class="text-lg font-bold text-slate-800"></p>
            </div>
            <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100">
                <span class="block text-[0.65rem] font-black text-slate-400 uppercase tracking-widest mb-3">Full Message</span>
                <p id="modalDetailMessage" class="text-slate-700 leading-relaxed font-medium"></p>
            </div>
            <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                <span id="modalDetailDate" class="text-sm font-black text-slate-400"></span>
                <button onclick="closeFeedbackModal()" class="btn-action bg-black text-white px-8">Close Details</button>
            </div>
        </div>
    </div>
</div>

<div id="newsHistoryModal" class="fixed inset-0 z-[2000] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="bg-white w-full max-w-2xl rounded-[35px] shadow-2xl p-10">
        <div class="flex justify-between items-start mb-6">
             <h2 class="text-2xl font-black tracking-tighter mb-0 text-black">Broadcast Details</h2>
            <button onclick="closeNewsHistoryModal()" class="text-slate-400 hover:text-black transition text-2xl"><i class="fas fa-times"></i></button>
        </div>
        <div class="space-y-5">
             <div class="flex gap-4">
                <div class="flex-1">
                    <span class="block text-[0.65rem] font-black text-slate-400 uppercase tracking-widest mb-1">Audience</span>
                    <p id="historyAudience" class="text-md font-bold text-slate-800 uppercase"></p>
                </div>
                 <div class="flex-1 text-right">
                    <span class="block text-[0.65rem] font-black text-slate-400 uppercase tracking-widest mb-1">Sent On</span>
                    <p id="historyDate" class="text-md font-bold text-slate-800"></p>
                </div>
            </div>
            <div>
                <span class="block text-[0.65rem] font-black text-slate-400 uppercase tracking-widest mb-1">Subject</span>
                <p id="historySubject" class="text-lg font-black text-slate-800"></p>
            </div>
            <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 max-h-[300px] overflow-y-auto">
                <p id="historyBody" class="text-slate-700 leading-relaxed font-medium whitespace-pre-wrap"></p>
            </div>
            <div id="historyAttachmentArea" class="hidden pt-4 border-t border-slate-100">
                 <span class="block text-[0.65rem] font-black text-slate-400 uppercase tracking-widest mb-3">Attachment</span>
                 <a id="historyAttachmentLink" href="#" target="_blank" class="flex items-center gap-3 bg-slate-100 p-4 rounded-2xl hover:bg-slate-200 transition font-bold text-slate-700">
                    <i class="fas fa-file-download text-xl"></i>
                    <span id="historyAttachmentName">filename.pdf</span>
                 </a>
            </div>
        </div>
    </div>
</div>

<script>
    /* --- DATA ARRAYS --- */
    // Changed const to let for bookingData to allow CRUD
    let bookingData = [
        @foreach($attendees as $att)
        { 
            id: {{ $att->id }},
            name: "{!! addslashes($att->name) !!}", 
            email: "{!! addslashes($att->email) !!}", 
            type: "{!! addslashes($att->ticket_type) !!}", 
            phone: "{!! addslashes($att->phone) !!}", 
            company: "{!! addslashes($att->company_name ?? '') !!}",
            position: "{!! addslashes($att->position ?? '') !!}",
            status: "{{ $att->booking_status }}",
            is_approved: {{ $att->is_approved ? 'true' : 'false' }},
            is_scanned: {{ $att->is_scanned ? 'true' : 'false' }},
            tx_ref: "{{ $att->tx_ref ?? '' }}",
            total_usd: {{ $att->total_usd ?? 0 }},
            date: "{{ \Carbon\Carbon::parse($att->created_at)->format('M d, Y') }}" 
        },
        @endforeach
    ];

    const feedbackData = [
        @foreach($feedbacks as $fb)
        { 
            name: "{!! addslashes($fb->name) !!}", 
            email: "{!! addslashes($fb->email) !!}", 
            subject: "{!! addslashes($fb->subject ?? '') !!}", 
            message: "{!! addslashes(preg_replace('/\r|\n/', ' ', $fb->message)) !!}", 
            date: "{{ \Carbon\Carbon::parse($fb->created_at)->format('M d, Y H:i') }}" 
        },
        @endforeach
    ];

    let sponsorsData = [
        @foreach($sponsors as $sp)
        { 
            id: {{ $sp->id }},
            company: "{!! addslashes($sp->company_name) !!}", 
            email: "{!! addslashes($sp->email) !!}", 
            phone: "{!! addslashes($sp->phone ?? '') !!}", 
            tier: "{!! addslashes($sp->level ?? '') !!}",
            is_posted: {{ !empty($sp->is_posted) ? 'true' : 'false' }},
            logo: "{{ $sp->logo_path ? asset('storage/' . $sp->logo_path) : '' }}"
        },
        @endforeach
    ];
    let actualPartnersData = [
        @foreach($partners as $pt)
        { 
            id: {{ $pt->id }},
            company: "{!! addslashes($pt->company_name ?? '') !!}", 
            firstName: "{!! addslashes($pt->first_name ?? '') !!}", 
            lastName: "{!! addslashes($pt->last_name ?? '') !!}", 
            position: "{!! addslashes($pt->position ?? '') !!}", 
            email: "{!! addslashes($pt->email ?? '') !!}", 
            phone: "{!! addslashes($pt->phone ?? '') !!}", 
            tier: "",
            is_posted: {{ !empty($pt->is_posted) ? 'true' : 'false' }},
            logo: "{!! $pt->logo_path ? asset('storage/' . $pt->logo_path) : '' !!}"
        },
        @endforeach
    ];

    let subscribersData = [
        @foreach($pureSubscribers as $sub)
        {
            email: "{!! addslashes($sub->email) !!}",
            date: "{{ \Carbon\Carbon::parse($sub->created_at)->format('M d, Y') }}"
        },
        @endforeach
    ];

    let newsletterHistory = [
        @foreach($broadcasts as $b)
        {
            id: {{ $b->id }},
            audience: "{{ strtoupper($b->audience) }}",
            subject: "{!! addslashes($b->subject) !!}",
            body: "{!! addslashes(preg_replace('/\r|\n/', '\n', $b->body)) !!}",
            date: "{{ \Carbon\Carbon::parse($b->created_at)->format('M d, Y H:i') }}",
            attachment: {!! $b->attachment_path ? "{ name: 'Attachment', url: '".asset('storage/'.$b->attachment_path)."' }" : 'null' !!},
            header_image: {!! $b->header_image_path ? "'".asset('storage/'.$b->header_image_path)."'" : 'null' !!},
            footer_image: {!! $b->footer_image_path ? "'".asset('storage/'.$b->footer_image_path)."'" : 'null' !!}
        },
        @endforeach
    ];
    let currentAttachmentFile = null;

    /* --- NOTIFICATION BELL LOGIC --- */
    function toggleNotifDropdown() {
        const dropdown = document.getElementById('notifDropdown');
        dropdown.classList.toggle('open');
    }
    // Close on click-outside
    document.addEventListener('click', function(e) {
        const wrapper = document.querySelector('.notif-wrapper');
        if (wrapper && !wrapper.contains(e.target)) {
            document.getElementById('notifDropdown').classList.remove('open');
        }
    });

    /* --- THEME TOGGLE LOGIC (NEW) --- */
    function toggleTheme() {
        document.body.classList.toggle('dark-mode');
        const isDark = document.body.classList.contains('dark-mode');
        const icon = document.querySelector('#themeIconBtn i');
        if(isDark) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            localStorage.setItem('theme', 'dark');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            localStorage.setItem('theme', 'light');
        }
    }
    // Load theme
    if(localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
        document.querySelector('#themeIconBtn i').classList.replace('fa-moon', 'fa-sun');
    }

    /* --- NAVIGATION --- */
    let currentFilter = 'all'; let currentPage = 1; const rowsPerPage = 6;
    let currPageSponsor = 1; let currPagePartner = 1; let currPageFeedback = 1;
    function showSection(id, element) {
        document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));
        document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
        document.getElementById(id).classList.add('active');
        element.classList.add('active');
        if(id === 'partners') { renderPartners(); }
        if(id === 'sponsors') { renderSponsors(); }
        if(id === 'booking') renderBookingTable();
        if(id === 'feedback') renderFeedbackTable();
    }

    function renderFeedbackTable() {
        const body = document.getElementById('feedbackBody');
        const searchTerm = document.getElementById('feedbackSearch').value.toLowerCase();
        body.innerHTML = '';
        const filtered = feedbackData.filter(i => i.name.toLowerCase().includes(searchTerm) || i.email.toLowerCase().includes(searchTerm) || i.date.toLowerCase().includes(searchTerm));
        const paginated = filtered.slice((currPageFeedback - 1) * rowsPerPage, currPageFeedback * rowsPerPage);
        
        paginated.forEach(row => {
            const div = document.createElement('div');
            div.className = "booking-card feedback-grid cursor-pointer hover:border-[#E6C200] transition-all";
            div.onclick = () => showFeedbackDetails(row);
            div.innerHTML = `<div class="flex items-center gap-3"><div class="profile-icon">${row.name.charAt(0)}</div><span class="font-black">${row.name}</span></div><div class="font-bold text-slate-500 truncate pr-4">${row.email}</div><div class="font-black text-slate-700 truncate pr-4">${row.subject}</div><div class="text-slate-400 text-sm italic truncate pr-4">"${row.message}"</div><div class="text-right font-black text-slate-400">${row.date}</div>`;
            body.appendChild(div);
        });
        
        updateGenericPagination(filtered.length, currPageFeedback, rowsPerPage, 'feedbackPageInfo', 'feedbackPaginationControls', function(newPage) { currPageFeedback = newPage; renderFeedbackTable(); });
    }

    function updateGenericPagination(totalRows, currentPageNo, rpp, infoId, controlsId, pageChangeCallback) {
        const controls = document.getElementById(controlsId);
        const info = document.getElementById(infoId);
        if(!controls || !info) return;
        const totalPages = Math.ceil(totalRows / rpp);
        controls.innerHTML = '';
        info.innerText = `Record ${totalRows > 0 ? (currentPageNo-1)*rpp+1 : 0} of ${totalRows}`;
        
        const prev = document.createElement('button'); prev.className = "pg-btn"; prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prev.disabled = currentPageNo === 1; prev.onclick = () => { pageChangeCallback(currentPageNo - 1); };
        controls.appendChild(prev);
        
        const next = document.createElement('button'); next.className = "pg-btn"; next.innerHTML = '<i class="fas fa-chevron-right"></i>';
        next.disabled = currentPageNo === totalPages || totalPages === 0; next.onclick = () => { pageChangeCallback(currentPageNo + 1); };
        controls.appendChild(next);
    }

    function showFeedbackDetails(data) {
        document.getElementById('modalDetailName').innerText = data.name;
        document.getElementById('modalDetailEmail').innerText = data.email;
        document.getElementById('modalDetailSubject').innerText = data.subject;
        document.getElementById('modalDetailMessage').innerText = data.message;
        document.getElementById('modalDetailDate').innerText = "Received on: " + data.date;
        document.getElementById('modalDetailIcon').innerText = data.name.charAt(0);
        document.getElementById('feedbackModal').classList.remove('hidden');
    }

    function closeFeedbackModal() { document.getElementById('feedbackModal').classList.add('hidden'); }

    function exportSponsorsPDF() {
        const element = document.getElementById('partnerGrid');
        html2pdf().from(element).save('Sponsors_Report.pdf');
    }

    function exportPartnersPDF() {
        const element = document.getElementById('actualPartnerGrid');
        html2pdf().from(element).save('Partners_Report.pdf');
    }

    function exportFeedbackPDF() {
        const element = document.getElementById('feedbackPrintArea');
        html2pdf().from(element).save('Feedback_Report.pdf');
    }

    /* --- BOOKING LOGIC (UPDATED WITH CRUD) --- */
    function setFilter(val, btn) {
        currentFilter = val; currentPage = 1;
        document.querySelectorAll('#booking .filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        renderBookingTable();
    }
    
    // UPDATED: Added Edit/Delete icons to the table
    function renderBookingTable() {
        const body = document.getElementById('bookingBody');
        body.innerHTML = '';
        const filtered = bookingData.filter(i => {
            if (currentFilter === 'all') return true;
            if (currentFilter === 'scanned') return i.is_scanned;
            if (currentFilter === 'not_scanned') return !i.is_scanned;
            return i.type === currentFilter;
        });
        const paginated = filtered.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);
        
        paginated.forEach((row, index) => {
            // Find actual index in global array for editing/deleting
            const globalIndex = bookingData.indexOf(row);
            
            const initial = row.name.charAt(0);
            let colorClass = row.type === 'Day 1' ? 'status-blue' : row.type === 'Day 2' ? 'status-purple' : row.type === 'Day 3' ? 'status-green' : 'status-yellow';
            let approveBtn = '';
            if(!row.is_approved && row.status === 'paid') {
                approveBtn = `<div onclick="approveAttendee(${globalIndex})" class="action-btn" style="background:#E6C200; color:black; width:auto; padding:0 12px; border-radius:15px; font-size:0.7rem;" title="Approve & Send QR"><i class="fas fa-check-circle mr-1"></i> Approve</div>`;
            } else if (row.is_approved) {
                approveBtn = `<div class="action-btn" style="background:#22c55e; color:white; width:auto; padding:0 12px; border-radius:15px; font-size:0.7rem; cursor:default;" title="Approved"><i class="fas fa-check-double mr-1"></i> Approved</div>`;
            }

            let receiptBtn = `<div onclick="showReceipt(${globalIndex})" class="action-btn" style="background:#3b82f6; color:white; width:auto; padding:0 12px; border-radius:15px; font-size:0.7rem;" title="View Receipt"><i class="fas fa-file-invoice mr-1"></i> Receipt</div>`;

            const div = document.createElement('div');
            // Container to hold both the main row and the hidden details row
            div.className = "mb-4 relative";

            div.innerHTML = `
                <div class="booking-card !mb-0" onclick="toggleRowDetails(${globalIndex})">
                    <div class="flex items-center gap-4"><div class="profile-icon">${initial}</div><div><span class="text-xl font-black">${row.name}</span><br><span class="text-slate-400 font-bold text-sm">${row.email}</span></div></div>
                    <div class="text-center"><span class="status-pill ${colorClass}">${row.type}</span></div>
                    <div class="text-center font-black text-slate-700">${row.phone}</div>
                    <div class="flex justify-end gap-3 items-center relative z-10" onclick="event.stopPropagation()">
                        ${receiptBtn}
                        ${approveBtn}
                        <div onclick="editBooking(${globalIndex})" class="action-btn edit-btn"><i class="fas fa-pen"></i></div>
                        <div onclick="deleteBooking(${globalIndex})" class="action-btn delete-btn"><i class="fas fa-trash"></i></div>
                    </div>
                </div>
                <div id="booking-details-${globalIndex}" class="hidden bg-slate-50 border border-slate-200 rounded-b-[30px] -mt-5 pt-8 pb-6 px-10 text-sm">
                    <div class="grid grid-cols-3 gap-6">
                        <div><span class="text-slate-400 text-xs font-black uppercase tracking-widest block mb-1">Registration Date</span><span class="font-bold text-slate-800">${row.date}</span></div>
                        <div><span class="text-slate-400 text-xs font-black uppercase tracking-widest block mb-1">Payment Status</span><span class="font-bold text-slate-800 uppercase">${row.status || 'Pending'}</span></div>
                        <div><span class="text-slate-400 text-xs font-black uppercase tracking-widest block mb-1">Transaction Ref</span><span class="font-bold text-slate-800">${row.tx_ref || 'N/A'}</span></div>
                        <div><span class="text-slate-400 text-xs font-black uppercase tracking-widest block mb-1">Company Name</span><span class="font-bold text-slate-800">${row.company || 'N/A'}</span></div>
                        <div><span class="text-slate-400 text-xs font-black uppercase tracking-widest block mb-1">Position</span><span class="font-bold text-slate-800">${row.position || 'N/A'}</span></div>
                        <div><span class="text-slate-400 text-xs font-black uppercase tracking-widest block mb-1">Approval</span><span class="font-bold ${row.is_approved ? 'text-green-600' : 'text-yellow-600'}">${row.is_approved ? 'Approved ✓' : 'Pending'}</span></div>
                    </div>
                </div>
            `;
            body.appendChild(div);
        });
        updatePagination(filtered.length);
    }

    function updatePagination(totalRows) {
        const controls = document.getElementById('paginationControls');
        const info = document.getElementById('pageInfo');
        const totalPages = Math.ceil(totalRows / rowsPerPage);
        controls.innerHTML = '';
        info.innerText = `Record ${totalRows > 0 ? (currentPage-1)*rowsPerPage+1 : 0} of ${totalRows}`;
        const prev = document.createElement('button'); prev.className = "pg-btn"; prev.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prev.disabled = currentPage === 1; prev.onclick = () => { currentPage--; renderBookingTable(); };
        controls.appendChild(prev);
        const next = document.createElement('button'); next.className = "pg-btn"; next.innerHTML = '<i class="fas fa-chevron-right"></i>';
        next.disabled = currentPage === totalPages || totalPages === 0; next.onclick = () => { currentPage++; renderBookingTable(); };
        controls.appendChild(next);
    }

    // Toggle expanded row details
    window.toggleRowDetails = function(index) {
        const el = document.getElementById('booking-details-' + index);
        if (el) {
            el.classList.toggle('hidden');
        }
    };

    // Receipt Modal Logic
    function toggleReceiptModal(show) {
        document.getElementById('receiptModal').classList.toggle('hidden', !show);
    }
    
    function showReceipt(index) {
        const row = bookingData[index];

        // Pricing per ticket type (ETB)
        const pricing = {
            'Day 1': 50 * 125,
            'Day 2': 60 * 125,
            'Day 3': 70 * 125,
            'Full Pass': 150 * 125
        };

        // Group attendees by tx_ref (same payment transaction)
        const txRef = row.tx_ref || null;
        let group = [];
        if (txRef) {
            group = bookingData.filter(a => a.tx_ref === txRef);
        } else {
            group = [row]; // no tx_ref → solo receipt
        }

        // Payer = first attendee in the group (payer's email)
        const payer = group[0];

        // Compute totals
        let totalETB = 0;
        group.forEach(a => { totalETB += pricing[a.type] || 0; });
        const chargeETB = totalETB * 0.025;
        const subTotalETB = totalETB - chargeETB;

        // Days purchased list (unique ticket types)
        const daysList = [...new Set(group.map(a => a.type))].join(', ');

        // Attendees list
        const attendeeNames = group.map(a => a.name).join(', ');

        // Build details rows
        const details = [
            { label: 'Payer Email / የከፋይ ኢሜይል', value: payer.email },
            { label: 'Attendees / ተሳታፊዎች', value: attendeeNames },
            { label: 'Ticket / Days Access', value: daysList },
            { label: 'Number of Tickets', value: group.length + ' ticket(s)' },
            { label: 'Payment Method / የክፍያ መንገድ', value: 'Chapa (Mobile/Transfer)' },
            { label: 'Status / ሁኔታ', value: 'Paid / ተከፍሏል' },
            { label: 'Payment Date / የክፍያ ቀን', value: payer.date },
            { label: 'Payment Reason / የክፍያ ምክንያት', value: 'Paid for tickets online' }
        ];

        let detailsHtml = '';
        details.forEach((item, i) => {
            const bg = (i % 2 === 1) ? 'background:#F9FAFB;' : '';
            detailsHtml += `
            <div style="display:flex; justify-content:space-between; align-items:center; padding:10px 16px; ${bg}">
                <span style="font-size:0.75rem; font-weight:700; color:#6b7280;">${item.label}</span>
                <span style="font-size:0.85rem; font-weight:700; color:#002A3C; text-align:right; max-width:55%;">${item.value}</span>
            </div>`;
        });

        document.getElementById('receiptDetailsTable').innerHTML = detailsHtml;
        document.getElementById('receiptIdBox').innerText = 'RC-' + (txRef ? txRef.split('-')[1] || txRef.substr(0,12).toUpperCase() : Math.random().toString(36).substr(2, 9).toUpperCase());
        document.getElementById('receiptSubTotal').innerText = subTotalETB.toLocaleString('en-ET', {minimumFractionDigits:2}) + ' ETB';
        document.getElementById('receiptCharge').innerText = chargeETB.toLocaleString('en-ET', {minimumFractionDigits:2}) + ' ETB';
        document.getElementById('receiptTotal').innerText = totalETB.toLocaleString('en-ET', {minimumFractionDigits:2}) + ' ETB';
        document.getElementById('receiptChapaRef').innerText = txRef || 'CH-REFERENCE-PENDING';

        toggleReceiptModal(true);
    }

    function downloadReceipt() {
        const element = document.getElementById('receiptPrintArea');
        const opt = {
            margin: 0.5,
            filename: 'Wennovate_Receipt.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, useCORS: true },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };
        html2pdf().set(opt).from(element).save();
    }

    // NEW: Booking CRUD Functions
    function toggleBookingModal(show) {
        document.getElementById('bookingModal').classList.toggle('hidden', !show);
        if(show) {
            if(document.getElementById('bookingEditIndex').value === "-1") {
                document.getElementById('addBookingForm').reset();
                document.getElementById('bookingModalTitle').innerText = "New Booking";
            }
        } else {
             document.getElementById('bookingEditIndex').value = "-1";
        }
    }

    function handleBookingSave() {
        const nameInput = document.getElementById('bName');
        const emailInput = document.getElementById('bEmail');
        const phoneInput = document.getElementById('bPhone');
        const companyInput = document.getElementById('bCompany');
        const positionInput = document.getElementById('bPosition');
        
        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const type = document.getElementById('bType').value;
        const phone = phoneInput.value.trim();
        const company = companyInput.value.trim();
        const position = positionInput.value.trim();
        const idx = parseInt(document.getElementById('bookingEditIndex').value);

        // Reset errors
        document.getElementById('bNameError').classList.add('hidden');
        document.getElementById('bEmailError').classList.add('hidden');
        document.getElementById('bPhoneError').classList.add('hidden');

        let isValid = true;

        // Validation: Name (Letters and spaces only)
        const nameRegex = /^[A-Za-z\s]+$/;
        if (!name) {
            document.getElementById('bNameError').innerText = "Name is required.";
            document.getElementById('bNameError').classList.remove('hidden');
            isValid = false;
        } else if (!nameRegex.test(name)) {
            document.getElementById('bNameError').innerText = "Name can only contain letters and spaces.";
            document.getElementById('bNameError').classList.remove('hidden');
            isValid = false;
        }

        // Validation: Email (strict format)
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!email) {
            document.getElementById('bEmailError').innerText = "Email is required.";
            document.getElementById('bEmailError').classList.remove('hidden');
            isValid = false;
        } else if (!emailRegex.test(email)) {
            document.getElementById('bEmailError').innerText = "Please enter a valid email address (e.g., name@domain.com).";
            document.getElementById('bEmailError').classList.remove('hidden');
            isValid = false;
        }

        // Validation: Phone (digit limit)
        const phoneRegex = /^(0\d{9}|\+251\s?\d{9})$/;
        if (!phone) {
            document.getElementById('bPhoneError').innerText = "Phone number is required.";
            document.getElementById('bPhoneError').classList.remove('hidden');
            isValid = false;
        } else if (!phoneRegex.test(phone)) {
            document.getElementById('bPhoneError').innerText = "Phone must be exactly format 0009090909 or +251 965879809.";
            document.getElementById('bPhoneError').classList.remove('hidden');
            isValid = false;
        }

        if (!isValid) return;

        const btn = document.querySelector('#addBookingForm button[type="button"]');
        const orig = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Saving...';
        btn.disabled = true;

        const fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('name', name);
        fd.append('email', email);
        fd.append('ticket_type', type);
        fd.append('phone', phone);
        fd.append('company_name', company);
        fd.append('position', position);

        if(idx > -1) {
            // ── EDIT: persist to backend ──
            const row = bookingData[idx];
            fd.append('id', row.id);

            fetch('/dashboard/attendee-update', { method: 'POST', body: fd })
                .then(r => r.json())
                .then(data => {
                    btn.innerHTML = orig;
                    btn.disabled = false;
                    if(data.success) {
                        bookingData[idx] = { ...bookingData[idx], name, email, type, phone, company, position };
                        renderBookingTable();
                        toggleBookingModal(false);
                    } else {
                        alert(data.message || 'Failed to update booking.');
                    }
                })
                .catch(() => { btn.innerHTML = orig; btn.disabled = false; alert('Connection error.'); });
        } else {
            // ── ADD: persist to backend and auto-email ──
            fetch('/dashboard/attendee-add', { method: 'POST', body: fd })
                .then(r => r.json())
                .then(data => {
                    btn.innerHTML = orig;
                    btn.disabled = false;
                    if (data.success) {
                        // Add returned attendee to local data
                        bookingData.unshift({
                            id: data.attendee.id,
                            name: data.attendee.name,
                            email: data.attendee.email,
                            type: data.attendee.ticket_type,
                            phone: data.attendee.phone,
                            company: company,
                            position: position,
                            status: data.attendee.booking_status,
                            is_approved: data.attendee.is_approved,
                            is_scanned: data.attendee.is_scanned,
                            tx_ref: data.attendee.tx_ref,
                            total_usd: data.attendee.total_usd,
                            date: data.attendee.date
                        });
                        renderBookingTable();
                        toggleBookingModal(false);
                        alert("Added successfully! QR code email has been sent to " + email);
                    } else {
                        const errorSpan = document.getElementById('bEmailError');
                        errorSpan.innerText = data.message || 'Failed to add booking.';
                        errorSpan.classList.remove('hidden');
                        document.getElementById('bEmail').style.borderColor = '#ef4444';
                    }
                })
                .catch(() => { 
                    btn.innerHTML = orig; 
                    btn.disabled = false; 
                    const errorSpan = document.getElementById('bEmailError');
                    errorSpan.innerText = 'Connection error.';
                    errorSpan.classList.remove('hidden');
                    document.getElementById('bEmail').style.borderColor = '#ef4444';
                });
        }
    }

    function editBooking(index) {
        const data = bookingData[index];
        document.getElementById('bookingEditIndex').value = index;
        document.getElementById('bName').value = data.name;
        document.getElementById('bEmail').value = data.email;
        document.getElementById('bType').value = data.type;
        document.getElementById('bPhone').value = data.phone;
        document.getElementById('bCompany').value = data.company || '';
        document.getElementById('bPosition').value = data.position || '';
        document.getElementById('bookingModalTitle').innerText = "Edit Booking";
        toggleBookingModal(true);
    }

    function deleteBooking(index) {
        const row = bookingData[index];
        if(!confirm(`Delete booking for "${row.name}"? This cannot be undone.`)) return;

        const fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('id', row.id);

        fetch('/dashboard/attendee-delete', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                if(data.success) {
                    bookingData.splice(index, 1);
                    renderBookingTable();
                } else {
                    alert(data.message || 'Failed to delete booking.');
                }
            })
            .catch(() => alert('Connection error while deleting.'));
    }

    function getFilteredBookingData() {
        return bookingData.filter(i => {
            if (currentFilter === 'all') return true;
            if (currentFilter === 'scanned') return i.is_scanned;
            if (currentFilter === 'not_scanned') return !i.is_scanned;
            return i.type === currentFilter;
        });
    }

    function downloadCSV(csvContent, fileName) {
        const blob = new Blob([csvContent], { type: 'text/csv' });
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = fileName;
        a.click();
    }

    function exportFilteredBookingCSV() {
        const data = getFilteredBookingData();
        let csv = "Name,Email,Ticket Type,Phone,Date\n";
        data.forEach(r => csv += `"${r.name}","${r.email}","${r.type}","${r.phone}","${r.date}"\n`);
        downloadCSV(csv, `Bookings_${currentFilter.replace(' ', '_')}.csv`);
    }

    function exportFilteredBookingPDF() {
        const data = getFilteredBookingData();
        let contentHtml = `<div style="padding: 40px; background: white;"><h2 style="text-align:center; margin-bottom: 20px;">Booking Report: ${currentFilter.toUpperCase()}</h2>`;
        contentHtml += `<table style="width:100%; border-collapse: collapse; font-family: sans-serif; font-size: 14px; text-align: left;">`;
        contentHtml += `<thead style="background: #f1f5f9; font-weight:bold;"><tr><th style="padding:10px; border:1px solid #ddd;">Name</th><th style="padding:10px; border:1px solid #ddd;">Email</th><th style="padding:10px; border:1px solid #ddd;">Type</th><th style="padding:10px; border:1px solid #ddd;">Phone</th><th style="padding:10px; border:1px solid #ddd;">Date</th></tr></thead><tbody>`;
        data.forEach(r => {
            contentHtml += `<tr><td style="padding:10px; border:1px solid #ddd;">${r.name}</td><td style="padding:10px; border:1px solid #ddd;">${r.email}</td><td style="padding:10px; border:1px solid #ddd;">${r.type}</td><td style="padding:10px; border:1px solid #ddd;">${r.phone}</td><td style="padding:10px; border:1px solid #ddd;">${r.date}</td></tr>`;
        });
        contentHtml += `</tbody></table></div>`;
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = contentHtml;
        const opt = {
            margin:       0.5,
            filename:     `Bookings_${currentFilter.replace(' ', '_')}.pdf`,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().set(opt).from(tempDiv).save();
    }


    /* --- SUBSCRIBER MANUAL ADD LOGIC --- */
    function toggleSubscriberModal(show) {
        const modal = document.getElementById('subscriberModal');
        const content = document.getElementById('subscriberModalContent');
        const msg = document.getElementById('subscriberErrorMsg');
        msg.classList.add('hidden');
        if (show) {
            document.getElementById('addSubscriberForm').reset();
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        } else {
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 200);
        }
    }

    document.getElementById('addSubscriberForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('newSubscriberEmail').value;
        const msg = document.getElementById('subscriberErrorMsg');
        const btn = document.getElementById('saveSubscriberBtn');
        
        btn.innerHTML = '<i class="fas fa-spinner fa-spin pr-2"></i> Adding...';
        btn.disabled = true;
        msg.classList.add('hidden');

        let fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('email', email);

        fetch("/subscribe-submit", {
            method: 'POST',
            body: fd
        }).then(r => r.json()).then(res => {
            if(res.success) {
                toggleSubscriberModal(false);
                try {
                    window.location.reload(); 
                    // This is an admin dashboard. Usually we just refetch data but let's just reload for safety if we don't know the fetch name.
                } catch(err) {}
            } else {
                msg.textContent = res.error || "Failed to add subscriber.";
                msg.classList.remove('hidden');
            }
        }).catch(err => {
            msg.textContent = "Error adding subscriber.";
            msg.classList.remove('hidden');
        }).finally(() => {
            btn.innerHTML = '<i class="fas fa-plus pr-2"></i> Add to List';
            btn.disabled = false;
        });
    });

    /* --- SPONSOR/PARTNER LOGIC --- */
    function togglePartnerModal(show, type = 'Sponsor') { 
        const modal = document.getElementById('partnerModal');
        modal.classList.toggle('hidden', !show);
        if(show) {
            const isSponsor = (type === 'Sponsor');
            document.getElementById('sponsorFields').classList.toggle('hidden', !isSponsor);
            document.getElementById('partnerFields').classList.toggle('hidden', isSponsor);
            document.getElementById('editId').value = '';
            if(document.getElementById('editId').value === '') {
                document.getElementById('addSponsorForm').reset();
                document.getElementById('logoPreviewContainer').classList.add('hidden');
                document.getElementById('modalTitle').innerText = 'New ' + type; 
                document.getElementById('entryType').value = type;
            }
        }
    }

    // Logo preview
    document.getElementById('pLogo').addEventListener('change', function() {
        const file = this.files[0];
        if(file) {
            const reader = new FileReader();
            reader.onload = e => {
                document.getElementById('logoPreview').src = e.target.result;
                document.getElementById('logoPreviewContainer').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    function handleEntrySave() {
        const type = document.getElementById('entryType').value;
        const editId  = document.getElementById('editId').value;

        if(type === 'Sponsor') {
            const c     = document.getElementById('cName').value.trim();
            const email = document.getElementById('pEmail').value.trim();
            const tier  = document.getElementById('pTier').value;
            const logoFile = document.getElementById('pLogo').files[0];
            const phone = document.getElementById('pPhone').value.trim();

            if(!/^[A-Za-z\s]+$/.test(c)) return alert('Company Name must contain only letters and spaces.');
            if(!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) return alert('Please enter a valid email address.');
            if(phone && !/^(0\d{9}|\+251\s?\d{9})$/.test(phone)) return alert('Phone must be exactly format 0009090909 or +251 965879809.');

            if(!tier) return alert('Please select a sponsorship level.');
            if(!editId && !logoFile) return alert('Please upload a company logo.');

            const fd = new FormData();
            fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
            fd.append('company_name', c);
            fd.append('email', email);
            fd.append('phone', document.getElementById('pPhone').value);
            fd.append('level', tier);
            if(editId) fd.append('id', editId);
            if(logoFile) fd.append('logo', logoFile);
            
            const btn = document.getElementById('saveEntryBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-sync fa-spin mr-2"></i> Saving...';
            btn.disabled = true;

            fetch('/dashboard/sponsor-save', { method: 'POST', body: fd })
                .then(r => r.json())
                .then(data => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    if(data.success) {
                        if (editId) {
                            const p = sponsorsData.find(x => x.id == editId);
                            if (p) {
                                p.company = c;
                                p.email = email;
                                p.phone = document.getElementById('pPhone').value.trim();
                                p.tier = tier;
                                if(data.logo_url) p.logo = data.logo_url;
                            }
                        } else {
                            sponsorsData.unshift({
                                id: data.id,
                                company: c,
                                email: email,
                                phone: document.getElementById('pPhone').value.trim(),
                                tier: tier,
                                logo: data.logo_url || '',
                                is_posted: false
                            });
                        }
                        renderSponsors();
                        togglePartnerModal(false);
                        document.getElementById('addSponsorForm').reset();
                        document.getElementById('logoPreviewContainer').classList.add('hidden');
                    } else {
                        const err = document.getElementById('pEmail').nextElementSibling;
                        err.innerText = data.message || 'Error saving sponsor.';
                        err.classList.remove('hidden');
                        document.getElementById('pEmail').style.borderColor = '#ef4444';
                    }
                })
                .catch(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    const err = document.getElementById('pEmail').nextElementSibling;
                    err.innerText = 'Error saving sponsor.';
                    err.classList.remove('hidden');
                    document.getElementById('pEmail').style.borderColor = '#ef4444';
                });
        } else if (type === 'Partner') {
            const cName = document.getElementById('partnerCName').value.trim();
            const email = document.getElementById('partnerEmail').value.trim();
            const phone = document.getElementById('partnerPhone').value.trim();
            const logoFile = document.getElementById('pLogo').files[0];

            if(!/^[A-Za-z\s]+$/.test(cName)) return alert('Company Name must contain only letters and spaces.');
            if(!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) return alert('Please enter a valid email address.');
            if(phone && !/^(0\d{9}|\+251\s?\d{9})$/.test(phone)) return alert('Phone must be exactly format 0009090909 or +251 965879809.');

            if(!editId && !logoFile) return alert('Please upload a company logo.');

            const fd = new FormData();
            fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
            fd.append('company_name', cName);
            fd.append('email', email);
            fd.append('phone', phone);
            if(logoFile) fd.append('logo', logoFile);
            if(editId) fd.append('id', editId);
            
            const btn = document.getElementById('saveEntryBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-sync fa-spin mr-2"></i> Saving...';
            btn.disabled = true;
            
            fetch('/dashboard/partner-save', { method: 'POST', body: fd })
                .then(r => r.json())
                .then(data => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    if(data.success) {
                        if (editId) {
                            const p = actualPartnersData.find(x => x.id == editId);
                            if (p) {
                                p.company = cName;
                                p.email = email;
                                p.phone = phone;
                                if(data.logo_url) p.logo = data.logo_url;
                            }
                        } else {
                            actualPartnersData.unshift({
                                id: data.id,
                                company: cName,
                                email: email,
                                phone: phone,
                                logo: data.logo_url || '',
                                is_posted: false
                            });
                        }
                        renderPartners();
                        togglePartnerModal(false);
                        document.getElementById('addSponsorForm').reset();
                        document.getElementById('logoPreviewContainer').classList.add('hidden');
                    } else {
                        const err = document.getElementById('partnerEmail').nextElementSibling;
                        err.innerText = data.message || 'Error saving partner.';
                        err.classList.remove('hidden');
                        document.getElementById('partnerEmail').style.borderColor = '#ef4444';
                    }
                })
                .catch(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    const err = document.getElementById('partnerEmail').nextElementSibling;
                    err.innerText = 'Error saving partner.';
                    err.classList.remove('hidden');
                    document.getElementById('partnerEmail').style.borderColor = '#ef4444';
                });
        }
    }

    function renderSponsors() {
        const grid = document.getElementById('partnerGrid'); grid.innerHTML = '';
        const paginated = sponsorsData.slice((currPageSponsor - 1) * rowsPerPage, currPageSponsor * rowsPerPage);
        paginated.forEach((p) => {
            const globalIndex = sponsorsData.indexOf(p);
            grid.appendChild(createCard(p, globalIndex, 'Sponsor'));
        });
        document.getElementById('sponsorCount').innerText = sponsorsData.length;
        updateGenericPagination(sponsorsData.length, currPageSponsor, rowsPerPage, 'sponsorPageInfo', 'sponsorPaginationControls', function(newPage) { currPageSponsor = newPage; renderSponsors(); });
    }
    function renderPartners() {
        const grid = document.getElementById('actualPartnerGrid'); grid.innerHTML = '';
        const paginated = actualPartnersData.slice((currPagePartner - 1) * rowsPerPage, currPagePartner * rowsPerPage);
        paginated.forEach((p) => {
            const globalIndex = actualPartnersData.indexOf(p);
            grid.appendChild(createCard(p, globalIndex, 'Partner'));
        });
        updateGenericPagination(actualPartnersData.length, currPagePartner, rowsPerPage, 'partnerPageInfo', 'partnerPaginationControls', function(newPage) { currPagePartner = newPage; renderPartners(); });
    }

    function createCard(p, index, type) {
        const card = document.createElement('div');
        card.className = "partner-card";
        let tierBadge = p.tier ? `<span class="text-[0.6rem] bg-slate-900 text-white px-3 py-1 rounded-full font-black uppercase mb-2 inline-block ml-2">${p.tier}</span>` : '';
        
        // Logo or building icon
        let logoHtml = p.logo
            ? `<img src="${p.logo}" alt="${p.company} logo" class="w-16 h-16 rounded-2xl object-contain border border-slate-100 mb-5">`
            : `<div class="w-14 h-14 rounded-2xl bg-slate-50 flex items-center justify-center text-xl mb-5 text-slate-300 border border-slate-100"><i class="fas fa-building"></i></div>`;
        
        let contactHtml = type === 'Sponsor'
            ? `<div><i class="fas fa-envelope text-slate-200 mr-2"></i> ${p.email}</div>
               <div><i class="fas fa-phone text-slate-200 mr-2"></i> ${p.phone}</div>`
            : `<div><i class="fas fa-user text-slate-200 mr-2"></i> ${p.firstName || ''} ${p.lastName || ''}</div>
               <div><i class="fas fa-envelope text-slate-200 mr-2"></i> ${p.email}</div>
               <div><i class="fas fa-phone text-slate-200 mr-2"></i> ${p.phone}</div>`;

        let positionHtml = type === 'Partner' && p.position
            ? `<span class="text-[0.6rem] bg-slate-900 text-white px-3 py-1 rounded-full font-black uppercase mb-5 inline-block">${p.position}</span>` : '';
        
        let postAction = '';
        if (type === 'Partner') {
            postAction = p.is_posted 
                ? `<div onclick="togglePostPartner(${index})" class="action-btn" style="background:#dc3545;font-size:0.7rem;width:auto;padding:0 10px;border-radius:15px;" title="Unpost"><i class="fas fa-eye-slash"></i> Unpost</div>` 
                : `<div onclick="togglePostPartner(${index})" class="action-btn" style="background:#28a745;font-size:0.7rem;width:auto;padding:0 10px;border-radius:15px;" title="Post"><i class="fas fa-eye"></i> Post</div>`;
        } else if (type === 'Sponsor') {
            postAction = p.is_posted 
                ? `<div onclick="togglePostSponsor(${index})" class="action-btn" style="background:#dc3545;font-size:0.7rem;width:auto;padding:0 10px;border-radius:15px;" title="Unpost"><i class="fas fa-eye-slash"></i> Unpost</div>` 
                : `<div onclick="togglePostSponsor(${index})" class="action-btn" style="background:#28a745;font-size:0.7rem;width:auto;padding:0 10px;border-radius:15px;" title="Post"><i class="fas fa-eye"></i> Post</div>`;
        }

        card.innerHTML = `
            <div class="card-actions">
                ${postAction}
                <div onclick="editEntry(${index}, '${type}')" class="action-btn edit-btn"><i class="fas fa-pen"></i></div>
                <div onclick="deleteEntry(${index}, '${type}')" class="action-btn delete-btn"><i class="fas fa-trash"></i></div>
            </div>
            ${logoHtml}
            <h3 class="text-xl font-black mb-1 flex items-center">${p.company} ${tierBadge}</h3>
            ${positionHtml}
            <div class="space-y-2 mt-4 pt-4 border-t border-slate-100 text-xs font-bold text-slate-600">
                ${contactHtml}
            </div>`;
        return card;
    }

    function deleteEntry(index, type) {
        if(confirm('Are you sure you want to delete this entry?')) {
            if(type === 'Sponsor') {
                const id = sponsorsData[index].id;
                if (!id) return;
                const fd = new FormData();
                fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                fd.append('id', id);
                fetch('/dashboard/sponsor-delete', { method: 'POST', body: fd })
                    .then(r => r.json())
                    .then(() => {
                        sponsorsData.splice(index, 1);
                        renderSponsors();
                    });
            } else {
                const id = actualPartnersData[index].id;
                if (!id) return;
                const fd = new FormData();
                fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
                fd.append('id', id);
                fetch('/dashboard/partner-delete', { method: 'POST', body: fd })
                    .then(r => r.json())
                    .then(() => {
                        actualPartnersData.splice(index, 1);
                        renderPartners();
                    });
            }
        }
    }

    function togglePostPartner(index) {
        const p = actualPartnersData[index];
        if (!p.id) return alert('This partner is not saved yet.');
        
        const fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('id', p.id);
        
        fetch('/dashboard/partner-toggle-post', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                if(data.success) {
                    p.is_posted = !p.is_posted;
                    renderPartners();
                }
            })
            .catch(() => alert('Error toggling post status.'));
    }

    function togglePostSponsor(index) {
        const p = sponsorsData[index];
        if (!p.id) return alert('This sponsor is not saved yet.');
        
        const fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('id', p.id);
        
        fetch('/dashboard/sponsor-toggle-post', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                if(data.success) {
                    p.is_posted = !p.is_posted;
                    renderSponsors();
                }
            })
            .catch(() => alert('Error toggling post status.'));
    }

    function editEntry(index, type) {
        const data = type === 'Sponsor' ? sponsorsData[index] : actualPartnersData[index];
        document.getElementById('entryType').value = type;
        document.getElementById('modalTitle').innerText = 'Edit ' + type;
        togglePartnerModal(true, type);

        // Populate common fields
        document.getElementById('editId').value = data.id || '';
        
        // Populate specific fields
        if(type === 'Sponsor') {
            document.getElementById('cName').value = data.company || '';
            document.getElementById('pPhone').value = data.phone || '';
            document.getElementById('pTier').value = data.tier || '';
            document.getElementById('pEmail').value = data.email || '';
        } else {
            document.getElementById('partnerCName').value = data.company || '';
            document.getElementById('partnerEmail').value = data.email || '';
            document.getElementById('partnerPhone').value = data.phone || '';
        }

        // Logo
        if(data.logo) {
            document.getElementById('logoPreview').src = data.logo;
            document.getElementById('logoPreviewContainer').classList.remove('hidden');
        } else {
            document.getElementById('logoPreviewContainer').classList.add('hidden');
            document.getElementById('logoPreview').src = '';
        }
    }

    /* --- NEWSLETTER LOGIC & DRAFTS --- */
    let currentNewsFilter = 'all';
    
    // Draft Logic: Event Listeners
    document.getElementById('emailSubject').addEventListener('input', (e) => localStorage.setItem('draft_subject', e.target.value));
    document.getElementById('emailBody').addEventListener('input', (e) => localStorage.setItem('draft_body', e.target.value));

    // Draft Logic: Load on Start
    window.addEventListener('load', () => {
        if(localStorage.getItem('draft_subject')) document.getElementById('emailSubject').value = localStorage.getItem('draft_subject');
        if(localStorage.getItem('draft_body')) document.getElementById('emailBody').value = localStorage.getItem('draft_body');
    });

    function setNewsFilter(val, btn) {
        document.querySelectorAll('.news-filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentNewsFilter = val;
        
        let attendeesEmails = bookingData.length;
        let feedbackEmails = feedbackData.length;
        let sponsorsEmails = sponsorsData.length;
        let partnersEmails = actualPartnersData.length;
        let subscribersCount = subscribersData.length;
        let allEmails = attendeesEmails + feedbackEmails + sponsorsEmails + partnersEmails + subscribersCount;

        const counts = { all: allEmails, ticket: attendeesEmails, sponsors: sponsorsEmails, partners: partnersEmails, feedback: feedbackEmails };
        const countLabels = { all: 'Subscribers', ticket: 'Ticket Buyers', sponsors: 'Sponsors', partners: 'Partners', feedback: 'Feedback contacts' };
        
        document.getElementById('recipientCount').innerText = counts[val].toLocaleString();
        document.getElementById('recipientLabel').innerText = countLabels[val].toUpperCase() + " NUMBER";
    }

    let currentHeaderFile = null;
    let currentFooterFile = null;

    function handleHeaderSelect() {
        const fileInput = document.getElementById('newsHeaderAttachment');
        const fileNameDisplay = document.getElementById('headerNameDisplay');
        if (fileInput.files.length > 0) {
            currentHeaderFile = fileInput.files[0];
            fileNameDisplay.innerText = currentHeaderFile.name;
        } else {
            currentHeaderFile = null;
            fileNameDisplay.innerText = "Choose Header...";
        }
    }

    function handleFooterSelect() {
        const fileInput = document.getElementById('newsFooterAttachment');
        const fileNameDisplay = document.getElementById('footerNameDisplay');
        if (fileInput.files.length > 0) {
            currentFooterFile = fileInput.files[0];
            fileNameDisplay.innerText = currentFooterFile.name;
        } else {
            currentFooterFile = null;
            fileNameDisplay.innerText = "Choose Footer...";
        }
    }

    function handleFileSelect() {
        const fileInput = document.getElementById('newsAttachment');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        if (fileInput.files.length > 0) {
            currentAttachmentFile = fileInput.files[0];
            fileNameDisplay.innerText = currentAttachmentFile.name;
        } else {
            currentAttachmentFile = null;
            fileNameDisplay.innerText = "File Attachment";
        }
    }

    function sendNewsletter() {
        const subject = document.getElementById('emailSubject').value;
        const body = document.getElementById('emailBody').value;
        
        if(!subject || !body) return alert("Please add a subject and body.");

        const btn = document.getElementById('sendBroadcastBtn');
        btn.disabled = true; btn.innerHTML = '<i class="fas fa-sync fa-spin mr-2"></i> Processing...';
        
        const fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('audience', currentNewsFilter);
        fd.append('subject', subject);
        fd.append('body', body);
        if(currentAttachmentFile) fd.append('attachment', currentAttachmentFile);
        if(currentHeaderFile) fd.append('header_image', currentHeaderFile);
        if(currentFooterFile) fd.append('footer_image', currentFooterFile);

        fetch('/dashboard/send-broadcast', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                if(data.success) {
                    // Clear Drafts
                    document.getElementById('emailSubject').value = '';
                    document.getElementById('emailBody').value = '';
                    localStorage.removeItem('draft_subject');
                    localStorage.removeItem('draft_body');
                    document.getElementById('newsAttachment').value = '';
                    document.getElementById('newsHeaderAttachment').value = '';
                    document.getElementById('newsFooterAttachment').value = '';
                    handleFileSelect(); 
                    handleHeaderSelect();
                    handleFooterSelect();
                    
                    let statusMsg = `Sent to ${data.sent_count} recipient(s)!`;
                    if(data.fail_count > 0) {
                        statusMsg += ` (${data.fail_count} failed)`;
                    }
                    btn.classList.add('success-state'); btn.innerHTML = '<i class="fas fa-check-circle mr-2"></i> ' + statusMsg;

                    if(data.fail_count > 0 && data.last_error) {
                        console.warn('Email send error:', data.last_error);
                    }

                    if(data.broadcast) {
                        newsletterHistory.unshift(data.broadcast);
                        renderNewsletterHistory();
                    }

                    setTimeout(() => { 
                        btn.classList.remove('success-state'); 
                        btn.innerHTML = '<i class="fas fa-bolt mr-2"></i> Send Broadcast Now';
                        btn.disabled = false;
                    }, 3000);
                } else {
                    alert(data.message || 'Error sending broadcast');
                    btn.classList.remove('success-state'); btn.innerHTML = '<i class="fas fa-bolt mr-2"></i> Send Broadcast Now'; 
                    btn.disabled = false; 
                }
            })
            .catch(() => {
                btn.classList.remove('success-state'); btn.innerHTML = '<i class="fas fa-bolt mr-2"></i> Send Broadcast Now'; 
                btn.disabled = false; 
                alert('Connection error');
            });
    }

    function renderNewsletterHistory() {
        const listContainer = document.getElementById('broadcastHistoryList');
        listContainer.innerHTML = '';
        if(newsletterHistory.length === 0) {
            listContainer.innerHTML = '<p class="text-slate-400 text-sm font-bold italic text-center py-4">No broadcasts sent yet.</p>';
            return;
        }
        newsletterHistory.forEach(item => {
            const div = document.createElement('div');
            div.className = "history-item";
            div.onclick = () => showNewsHistoryDetails(item.id);
            div.innerHTML = `
                <div class="flex justify-between items-center mb-1">
                    <span class="font-black text-xs uppercase text-slate-400">${item.audience}</span>
                    <span class="text-[0.65rem] font-bold text-slate-400">${item.date}</span>
                </div>
                <h6 class="font-bold text-sm truncate">${item.subject}</h6>
                ${item.attachment ? '<i class="fas fa-paperclip text-xs text-slate-400 mt-1"></i>' : ''}
            `;
            listContainer.appendChild(div);
        });
    }

    // Call it initially
    renderNewsletterHistory();
    // And set the 'all' count
    setNewsFilter('all', document.querySelector('.news-filter-btn.active'));

    function showNewsHistoryDetails(id) {
        const item = newsletterHistory.find(i => i.id === id);
        if(!item) return;
        document.getElementById('historyAudience').innerText = item.audience;
        document.getElementById('historyDate').innerText = item.date;
        document.getElementById('historySubject').innerText = item.subject;
        document.getElementById('historyBody').innerText = item.body;
        
        const attachArea = document.getElementById('historyAttachmentArea');
        if(item.attachment || item.header_image || item.footer_image) {
            attachArea.classList.remove('hidden');
            attachArea.innerHTML = '<span class="block text-[0.65rem] font-black text-slate-400 uppercase tracking-widest mb-3">Attachments & Images</span>';
            
            if (item.attachment) {
                attachArea.innerHTML += `
                 <a href="${item.attachment.url}" target="_blank" class="flex items-center gap-3 bg-slate-100 p-4 rounded-2xl hover:bg-slate-200 transition font-bold text-slate-700 mb-2">
                    <i class="fas fa-file-download text-xl"></i>
                    <span>${item.attachment.name}</span>
                 </a>`;
            }
            if (item.header_image) {
                attachArea.innerHTML += `
                 <a href="${item.header_image}" target="_blank" class="flex items-center gap-3 bg-slate-100 p-4 rounded-2xl hover:bg-slate-200 transition font-bold text-slate-700 mb-2">
                    <i class="fas fa-image text-xl text-blue-500"></i>
                    <span>Header Image</span>
                 </a>`;
            }
            if (item.footer_image) {
                attachArea.innerHTML += `
                 <a href="${item.footer_image}" target="_blank" class="flex items-center gap-3 bg-slate-100 p-4 rounded-2xl hover:bg-slate-200 transition font-bold text-slate-700 mb-2">
                    <i class="fas fa-image text-xl text-green-500"></i>
                    <span>Footer Image</span>
                 </a>`;
            }

        } else {
            attachArea.classList.add('hidden');
        }
        document.getElementById('newsHistoryModal').classList.remove('hidden');
    }

    function closeNewsHistoryModal() { document.getElementById('newsHistoryModal').classList.add('hidden'); }

    /* --- SETTINGS LOGIC --- */
    function togglePasswordState(inputId, icon) {
        const input = document.getElementById(inputId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    function handleSettingsSave(e) {
        e.preventDefault();
        const email = document.getElementById('set_email').value.trim();
        const currentPass = document.getElementById('set_current_password').value;
        const newPass = document.getElementById('set_new_password').value;
        
        if(!email || !currentPass) return alert("Email and Current Password are required!");
        
        const fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('email', email);
        fd.append('current_password', currentPass);
        if(newPass) fd.append('new_password', newPass);
        
        const btn = document.getElementById('saveSettingsBtn');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-sync fa-spin mr-2"></i> Saving...';
        btn.disabled = true;
        
        fetch('/dashboard/settings-save', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                if(data.success) {
                    alert('Settings updated successfully!');
                    document.getElementById('set_current_password').value = '';
                    document.getElementById('set_new_password').value = '';
                } else {
                    alert(data.message || 'Error updating settings.');
                }
            })
            .catch(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                alert('Something went wrong. Please check your connection.');
            });
    }

    /* --- ADVANCED CHART --- */
    const ctx = document.getElementById('perfChart').getContext('2d');
    
    // Create Gradient
    let gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(230, 194, 0, 0.5)'); // Brand Gold
    gradient.addColorStop(1, 'rgba(230, 194, 0, 0.0)');

    let perfD1 = bookingData.filter(b => b.type === 'Day 1').length;
    let perfD2 = bookingData.filter(b => b.type === 'Day 2').length;
    let perfD3 = bookingData.filter(b => b.type === 'Day 3').length;
    let perfFE = bookingData.filter(b => b.type === 'Full Event').length;

    new Chart(ctx, {
        type: 'line',
        data: { 
            labels: ['Day 1', 'Day 2', 'Day 3', 'Full Event'],
            datasets: [{ 
                data: [perfD1, perfD2, perfD3, perfFE], 
                borderColor: '#E6C200', 
                backgroundColor: gradient,
                borderWidth: 4, 
                tension: 0.4, // Smoother curve
                pointRadius: 6,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#E6C200',
                pointBorderWidth: 3,
                fill: true // Fill the area
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: false, 
            plugins: { legend: { display: false }, tooltip: { backgroundColor: '#000', titleColor: '#E6C200', padding: 10, cornerRadius: 10 } }, 
            scales: { 
                y: { display: true, beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)', borderDash: [5, 5] }, ticks: { font: { weight: 'bold' }, precision: 0 } }, 
                x: { grid: { display: false }, ticks: { font: { weight: 'bold' } } } 
            } 
        }
    });

    // Close profile dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('profileDropdown');
        const container = document.querySelector('.profile-dropdown-container');
        if (dropdown && !dropdown.classList.contains('hidden') && container && !container.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    /* --- APPROVAL LOGIC --- */
    function approveAttendee(index) {
        const row = bookingData[index];
        if(!confirm(`Approve ticket for ${row.name} and send QR code email?`)) return;
        
        const fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('id', row.id);

        const btnHtml = event.currentTarget.innerHTML;
        event.currentTarget.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Approving...';
        event.currentTarget.style.pointerEvents = 'none';

        fetch('/dashboard/attendee-approve', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                if(data.success) {
                    row.is_approved = true;
                    renderBookingTable();
                    alert('Attendee approved and email sent successfully!');
                } else {
                    alert('Error: ' + data.message);
                    renderBookingTable(); // reset button
                }
            })
            .catch(err => {
                alert('Connection error while approving attendee.');
                renderBookingTable();
            });
    }

    /* --- QR SCANNER LOGIC --- */
    let html5QrcodeScanner = null;
    let isScanning = false;

    function startScanner() {
        if(isScanning) return;
        
        document.getElementById('start-scan-btn').classList.add('hidden');
        document.getElementById('stop-scan-btn').classList.remove('hidden');
        document.getElementById('scan-status-message').innerText = 'Camera Access Requested...';
        document.getElementById('scan-status-message').className = 'text-center text-blue-500 font-bold mb-5';

        html5QrcodeScanner = new Html5Qrcode("qr-reader");
        const config = { fps: 10, qrbox: { width: 250, height: 250 } };

        html5QrcodeScanner.start(
            { facingMode: "environment" },
            config,
            onScanSuccess,
            onScanFailure
        ).then(() => {
            isScanning = true;
            document.getElementById('scan-status-message').innerText = 'Scanning... Point camera at QR Code';
            document.getElementById('scan-status-icon').innerHTML = '<i class="fas fa-expand text-3xl text-blue-500 animate-pulse"></i>';
        }).catch(err => {
            alert('Failed to start camera: ' + err);
            stopScanner();
        });
    }

    function stopScanner() {
        if(!isScanning || !html5QrcodeScanner) return;
        
        html5QrcodeScanner.stop().then((ignore) => {
            isScanning = false;
            document.getElementById('start-scan-btn').classList.remove('hidden');
            document.getElementById('stop-scan-btn').classList.add('hidden');
            document.getElementById('qr-reader-results').innerText = '';
            
            document.getElementById('scan-status-icon').innerHTML = '<i class="fas fa-qrcode text-3xl text-slate-400"></i>';
            document.getElementById('scan-status-message').innerText = 'Scanner Stopped';
            document.getElementById('scan-status-message').className = 'text-center text-slate-500 font-bold mb-5';
            
            document.getElementById('scan-result-name').innerText = '-';
            document.getElementById('scan-result-type').innerText = '-';
        }).catch((err) => {
            console.error(err);
        });
    }

    function onScanSuccess(decodedText, decodedResult) {
        // Stop scanning to prevent multiple triggers
        stopScanner();
        
        document.getElementById('scan-status-icon').innerHTML = '<i class="fas fa-spinner fa-spin text-3xl text-yellow-500"></i>';
        document.getElementById('scan-status-message').innerText = 'Verifying QR Code...';
        document.getElementById('scan-status-message').className = 'text-center text-yellow-500 font-bold mb-5';

        const fd = new FormData();
        fd.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        fd.append('qr_token', decodedText);

        fetch('/dashboard/scan-qr', { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                if(data.success) {
                    document.getElementById('scan-status-icon').innerHTML = '<i class="fas fa-check-circle text-4xl text-green-500"></i>';
                    document.getElementById('scan-status-message').innerText = data.message;
                    document.getElementById('scan-status-message').className = 'text-center text-green-500 font-bold mb-5 text-lg';
                    
                    // Parse name from message string simply, or better if backend passed details
                    // For now, let's keep it simple
                    document.getElementById('scan-result-name').innerText = 'Verified';
                    document.getElementById('scan-result-type').innerText = 'Checked In';
                    
                    // Optional play success sound
                } else {
                    document.getElementById('scan-status-icon').innerHTML = '<i class="fas fa-times-circle text-4xl text-red-500"></i>';
                    document.getElementById('scan-status-message').innerText = data.message;
                    document.getElementById('scan-status-message').className = 'text-center text-red-500 font-bold mb-5';
                    
                    document.getElementById('scan-result-name').innerText = 'Denied';
                    document.getElementById('scan-result-type').innerText = 'Invalid / Scanned';
                }

                // Give user a moment to see result, then allow scan again
                setTimeout(() => {
                    document.getElementById('start-scan-btn').classList.remove('hidden');
                }, 3000);
            })
            .catch(err => {
                alert('Connection error while verifying QR.');
                document.getElementById('scan-status-icon').innerHTML = '<i class="fas fa-exclamation-triangle text-3xl text-orange-500"></i>';
                document.getElementById('start-scan-btn').classList.remove('hidden');
            });
    }

    function onScanFailure(error) {
        // handle scan failure, usually just background noise, don't alert
    }

    let currPageSubscriber = 1;

    renderBookingTable();
    renderSponsors(); 
    renderSubscribersTable();

    function renderSubscribersTable() {
        const bd = document.getElementById('subscribersBody');
        bd.innerHTML = '';
        if(subscribersData.length === 0) {
            bd.innerHTML = '<div class="booking-row text-center text-slate-400 font-bold py-8">No subscribers yet</div>';
            return;
        }

        const paginated = subscribersData.slice((currPageSubscriber - 1) * rowsPerPage, currPageSubscriber * rowsPerPage);
        paginated.forEach((fb, i) => {
            const rowIndex = (currPageSubscriber - 1) * rowsPerPage + i;
            const row = document.createElement('div');
            row.className = "booking-row grid grid-cols-3 gap-4";
            row.innerHTML = `
                <div class="font-bold text-slate-800">
                    <a href="mailto:${fb.email}" class="text-blue-500 hover:underline"><i class="fas fa-envelope mr-2 text-slate-400"></i>${fb.email}</a>
                </div>
                <div class="text-slate-500 font-bold">${fb.date}</div>
                <div class="text-right">
                    <button class="bg-slate-100 px-3 py-1 rounded text-xs font-bold text-slate-600 hover:bg-slate-200">Subscribed</button>
                </div>
            `;
            bd.appendChild(row);
        });
        updateGenericPagination(subscribersData.length, currPageSubscriber, rowsPerPage, 'subscriberPageInfo', 'subscriberPaginationControls', function(newPage) { currPageSubscriber = newPage; renderSubscribersTable(); });
    }

    function exportSubscribersPDF() {
        const area = document.getElementById('subscribersPrintArea');
        const controls = document.getElementById('subscriberPaginationArea');
        controls.style.display = 'none';
        
        const tempDiv = area.cloneNode(true);
        tempDiv.style.background = '#fff';
        tempDiv.style.padding = '20px';
        tempDiv.querySelectorAll('.booking-row').forEach(row => { row.style.boxShadow = 'none'; row.style.borderBottom = '1px solid #f1f5f9'; row.style.borderRadius = '0'; });
        
        const header = document.createElement('h2');
        header.innerText = 'Stay Updated Mailing List';
        header.style.marginBottom = '20px';
        tempDiv.prepend(header);
        
        html2pdf().set({ margin: 10, filename: 'Subscribers-List.pdf', html2canvas: { scale: 2 }, jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' } }).from(tempDiv).save().then(() => {
            controls.style.display = 'flex';
        });
    }

    function verifyAdminEmail(inputEl) {
        const val = inputEl.value;
        const errorEl = inputEl.nextElementSibling;
        const modalForm = inputEl.closest('form');
        const submitBtn = modalForm.querySelector('button[type="button"]') || modalForm.querySelector('button[type="submit"]');

        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!val || !emailRegex.test(val)) return;

        const fd = new FormData();
        fd.append('_token', '{{ csrf_token() }}');
        fd.append('email', val);

        fetch("{{ url('/verify-email-ajax') }}", { method: 'POST', body: fd })
            .then(r => r.json())
            .then(data => {
                if(!data.success) {
                    errorEl.innerText = data.message;
                    errorEl.classList.remove('hidden');
                    inputEl.style.borderColor = '#ef4444';
                    if(submitBtn) submitBtn.disabled = true;
                } else {
                    errorEl.classList.add('hidden');
                    inputEl.style.borderColor = '#22c55e';
                    // We need to make sure submitBtn is re-enabled but only if no other errors exist.
                    // For simplicity, we enable it here.
                    if(submitBtn) submitBtn.disabled = false;
                }
            }).catch(e => console.error('Email check failed', e));
    }
</script>
