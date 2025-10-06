<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messaging - Ina Matrimony</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Times New Roman', serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
            width: auto;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logout-btn {
            background: linear-gradient(135deg, #e91e63 0%, #ac0742 100%);
            color: white;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(233, 30, 99, 0.3);
        }
        
        .main-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px);
            padding: 2rem;
        }
        
        .messaging-container {
            background: white;
            border-radius: 25px;
            padding: 4rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 700px;
            width: 100%;
            animation: slideIn 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .messaging-icon {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 4.5rem;
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 12px 35px rgba(23, 162, 184, 0.4);
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
        }
        
        .greeting {
            font-size: 4rem;
            font-weight: bold;
            color: #17a2b8;
            margin-bottom: 1rem;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.1);
        }
        
        .subtitle {
            font-size: 1.5rem;
            color: #6c757d;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .messaging-message {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 3rem;
            padding: 2rem;
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.08) 0%, rgba(19, 132, 150, 0.08) 100%);
            border-radius: 20px;
            border-left: 5px solid #17a2b8;
            line-height: 1.7;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin: 2.5rem 0;
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 20px;
        }
        
        .stat-item {
            text-align: center;
            padding: 1rem;
            border-radius: 15px;
            background: white;
            transition: all 0.3s;
        }
        
        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .stat-number {
            font-size: 2.2rem;
            font-weight: bold;
            color: #17a2b8;
        }
        
        .stat-label {
            font-size: 1rem;
            color: #6c757d;
            margin-top: 0.8rem;
            line-height: 1.3;
        }
        
        .message-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin: 2rem 0;
        }
        
        .feature-card {
            background: linear-gradient(135deg, rgba(23, 162, 184, 0.05) 0%, rgba(19, 132, 150, 0.05) 100%);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: left;
            border: 1px solid rgba(23, 162, 184, 0.1);
        }
        
        .feature-card h4 {
            color: #17a2b8;
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
        }
        
        .feature-card p {
            color: #6c757d;
            line-height: 1.5;
            font-size: 1rem;
        }
        
        .action-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            padding: 1.2rem 2.5rem;
            border-radius: 35px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 1.1rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #e91e63 0%, #ac0742 100%);
            color: white;
        }
        
        .btn-outline {
            background: transparent;
            color: #17a2b8;
            border: 2px solid #17a2b8;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .btn-primary:hover {
            box-shadow: 0 10px 30px rgba(23, 162, 184, 0.4);
        }
        
        .btn-secondary:hover {
            box-shadow: 0 10px 30px rgba(233, 30, 99, 0.4);
        }
        
        .btn-outline:hover {
            background: #17a2b8;
            color: white;
        }
        
        .decorative-messages {
            position: absolute;
            top: -15px;
            right: -15px;
            font-size: 2.5rem;
            color: rgba(23, 162, 184, 0.2);
            animation: pulse 3s ease-in-out infinite;
        }
        
        .decorative-messages:nth-child(2) {
            bottom: -15px;
            left: -15px;
            top: auto;
            right: auto;
            animation-delay: 1.5s;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 0.2;
                transform: scale(1);
            }
            50% {
                opacity: 0.6;
                transform: scale(1.1);
            }
        }
        
        @media (max-width: 768px) {
            .messaging-container {
                padding: 2.5rem 1.5rem;
                margin: 1rem;
            }
            
            .greeting {
                font-size: 3rem;
            }
            
            .subtitle {
                font-size: 1.3rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .message-features {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Ina Matrimony">
        </div>
        <div class="user-info">
            <span>Hi, <strong style="color: #e91e63;">SHIFANA</strong></span>
            <button class="logout-btn">Logout</button>
        </div>
    </div>
    
    <div class="main-container">
        <div class="messaging-container">
            <div class="decorative-messages">💬📩</div>
            <div class="decorative-messages">📨💌</div>
            
            <div class="messaging-icon">💬</div>
            
            <h1 class="greeting">Hi!</h1>
            <p class="subtitle">Welcome to your Messaging Center</p>
            
            <div class="messaging-message">
                Connect with potential matches through secure messaging! Send and receive messages, share interests, and build meaningful connections in a safe environment.
            </div>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">24</div>
                    <div class="stat-label">Active Conversations</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">7</div>
                    <div class="stat-label">New Messages</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">45</div>
                    <div class="stat-label">Total Messages</div>
                </div>
            </div>
            
            <div class="message-features">
                <div class="feature-card">
                    <h4>🔒 Secure Messaging</h4>
                    <p>All conversations are encrypted and secure. Your privacy is our top priority.</p>
                </div>
                <div class="feature-card">
                    <h4>📸 Photo Sharing</h4>
                    <p>Share photos and express yourself better with multimedia messaging.</p>
                </div>
                <div class="feature-card">
                    <h4>🚫 Block & Report</h4>
                    <p>Easy tools to block unwanted contacts and report inappropriate behavior.</p>
                </div>
                <div class="feature-card">
                    <h4>⚡ Instant Notifications</h4>
                    <p>Get notified instantly when you receive new messages from potential matches.</p>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('shortlist') }}" class="btn btn-primary">
                    ⭐ Shortlist
                </a>
                <a href="{{ route('my-interest') }}" class="btn btn-secondary">
                    ❤️ My Interests
                </a>
                <a href="{{ route('my-profile') }}" class="btn btn-outline">
                    👤 My Profile
                </a>
            </div>
        </div>
    </div>
</body>
</html>