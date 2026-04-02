<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wennovate | Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #020617, #0f172a);
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border-radius: 40px;
            padding: 50px;
            width: 100%;
            max-width: 480px;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: -50%; right: -50%;
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(230, 194, 0, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 0;
        }

        .icon-container {
            width: 80px; height: 80px;
            background: linear-gradient(to bottom right, #E6C200, #C5A300);
            border-radius: 25px;
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem; color: #000;
            box-shadow: 0 15px 30px rgba(230, 194, 0, 0.3);
            margin: 0 auto 30px auto;
            position: relative; z-index: 10;
        }

        .input-group {
            position: relative; z-index: 10;
            margin-bottom: 25px;
        }

        .input-group label {
            display: block; font-size: 0.75rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 1px;
            color: #94a3b8; margin-bottom: 8px;
        }

        .input-field {
            width: 100%; background: rgba(2, 6, 23, 0.8);
            border: 1px solid #334155; border-radius: 18px;
            padding: 16px 20px; font-weight: 600; color: #fff;
            outline: none; transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: #E6C200;
            box-shadow: 0 0 0 4px rgba(230, 194, 0, 0.1);
        }

        .btn-submit {
            position: relative; z-index: 10;
            width: 100%; background: #E6C200; color: #000;
            padding: 18px; border-radius: 20px;
            font-weight: 900; font-size: 0.95rem; text-transform: uppercase;
            transition: all 0.3s ease; display: inline-block; text-align: center;
        }

        .btn-submit:hover {
            background: #FFD700;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(230, 194, 0, 0.4);
        }

        /* Error alert */
        .error-alert {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5; padding: 15px; border-radius: 15px;
            font-weight: 600; font-size: 0.85rem; text-align: center;
            margin-bottom: 25px; position: relative; z-index: 10;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="icon-container">
            <i class="fas fa-lock"></i>
        </div>
        
        <h2 class="text-3xl font-black text-center mb-2 relative z-10 text-white">Welcome Back</h2>
        <p class="text-center text-slate-400 font-medium mb-8 relative z-10">Sign in to the Admin Dashboard</p>

        @if(session('error'))
            <div class="error-alert">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="input-group">
                <label>Email Address</label>
                <div class="relative">
                    <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                    <input type="email" name="email" class="input-field pl-12" placeholder="admin@wennovate.com" required value="{{ old('email') }}">
                </div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="relative">
                    <i class="fas fa-key absolute left-4 top-1/2 -translate-y-1/2 text-slate-500"></i>
                    <input type="password" name="password" id="login_password" class="input-field pl-12 pr-12" placeholder="••••••••" required>
                    <i class="fas fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-[#E6C200] cursor-pointer transition" onclick="togglePassword('login_password', this)"></i>
                </div>
            </div>

            <button type="submit" class="btn-submit mt-4">
                Access Dashboard <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </form>
    </div>


</body>
<script>
    function togglePassword(inputId, icon) {
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
</script>
</html>
