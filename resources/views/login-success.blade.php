<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Ina Matrimony</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .success-container {
            background: white;
            padding: 4rem;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        
        .logo {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ac0742;
            margin-bottom: 1rem;
        }
        
        .welcome-message {
            font-size: 3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
            animation: fadeIn 1s ease-in;
        }
        
        .sub-message {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 2rem;
        }
        
        .success-icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }
        
        .btn-continue {
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #e91e63 0%, #ac0742 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin: 0.5rem;
        }
        
        .btn-continue:hover {
            background: linear-gradient(135deg, #d81b60 0%, #8a0635 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(233, 30, 99, 0.3);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="logo">Ina Matrimony</div>
        <div class="success-icon">✓</div>
        <div class="welcome-message">Hi!</div>
        <div class="sub-message">Welcome to your account. You have successfully logged in.</div>
        
        <a href="{{ route('home') }}" class="btn-continue">Continue to Dashboard</a>
        <a href="{{ route('home') }}" class="btn-continue" style="background: #6c757d;">Back to Home</a>
    </div>
</body>
</html>