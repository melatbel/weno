<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Wennovate Africa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6a0dad;
            --secondary: #FFD700;
            --dark: #0a0f3f;
            --success: #22c55e;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f4f5f7;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        .success-card {
            background: white;
            border-radius: 30px;
            padding: 50px 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            animation: scaleIn 0.5s ease;
        }

        .success-icon i {
            font-size: 3rem;
            color: white;
        }

        .success-card h1 {
            font-weight: 800;
            color: var(--dark);
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .success-card p {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .tx-ref {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 20px;
            font-family: monospace;
            font-size: 0.9rem;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 25px;
            display: inline-block;
        }

        .home-btn {
            display: inline-block;
            padding: 16px 40px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--primary), #4c1d95);
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.05rem;
            transition: 0.3s;
        }

        .home-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(106, 13, 173, 0.3);
        }

        @keyframes scaleIn {
            from { transform: scale(0); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>

<div class="success-card">
    <div class="success-icon">
        <i class="fas fa-check"></i>
    </div>
    <h1>Payment Successful!</h1>
    <p>Thank you for registering for the Wennovate Summit. Your ticket purchase has been confirmed. You will receive a confirmation email shortly.</p>
    
    @if($tx_ref)
    <div class="tx-ref">
        Ref: {{ $tx_ref }}
    </div>
    <br><br>
    @endif

    <a href="{{ url('/') }}" class="home-btn">
        <i class="fas fa-home"></i>&nbsp; Back to Home
    </a>
</div>


</body>
</html>
