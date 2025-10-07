<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Stories - Ina Matrimony</title>
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
        
        .top-nav {
            background: #f8f9fa;
            padding: 0.75rem 2rem;
            display: flex;
            gap: 2rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .top-nav a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .top-nav a:hover {
            background: #fd7e14;
            color: white;
        }
        
        .main-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px);
            padding: 2rem;
        }
        
        .stories-container {
            background: white;
            border-radius: 25px;
            padding: 4rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 750px;
            width: 100%;
            animation: fadeInUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stories-icon {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: linear-gradient(135deg, #fd7e14 0%, #e63946 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 4.5rem;
            animation: heartbeat 2s infinite;
            box-shadow: 0 12px 35px rgba(253, 126, 20, 0.4);
        }
        
        @keyframes heartbeat {
            0%, 50%, 100% {
                transform: scale(1);
            }
            25%, 75% {
                transform: scale(1.1);
            }
        }
        
        .greeting {
            font-size: 4rem;
            font-weight: bold;
            color: #fd7e14;
            margin-bottom: 1rem;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.1);
        }
        
        .subtitle {
            font-size: 1.5rem;
            color: #6c757d;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .stories-message {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 3rem;
            padding: 2rem;
            background: linear-gradient(135deg, rgba(253, 126, 20, 0.08) 0%, rgba(230, 57, 70, 0.08) 100%);
            border-radius: 20px;
            border-left: 5px solid #fd7e14;
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
            color: #fd7e14;
        }
        
        .stat-label {
            font-size: 1rem;
            color: #6c757d;
            margin-top: 0.8rem;
            line-height: 1.3;
        }
        
        .success-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin: 2rem 0;
        }
        
        .feature-card {
            background: linear-gradient(135deg, rgba(253, 126, 20, 0.05) 0%, rgba(230, 57, 70, 0.05) 100%);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: left;
            border: 1px solid rgba(253, 126, 20, 0.1);
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(253, 126, 20, 0.15);
        }
        
        .feature-card h4 {
            color: #fd7e14;
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
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
            background: linear-gradient(135deg, #fd7e14 0%, #e63946 100%);
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #e91e63 0%, #ac0742 100%);
            color: white;
        }
        
        .btn-outline {
            background: transparent;
            color: #fd7e14;
            border: 2px solid #fd7e14;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .btn-primary:hover {
            box-shadow: 0 10px 30px rgba(253, 126, 20, 0.4);
        }
        
        .btn-secondary:hover {
            box-shadow: 0 10px 30px rgba(233, 30, 99, 0.4);
        }
        
        .btn-outline:hover {
            background: #fd7e14;
            color: white;
        }
        
        .decorative-hearts {
            position: absolute;
            top: -15px;
            right: -15px;
            font-size: 2.5rem;
            color: rgba(253, 126, 20, 0.2);
            animation: romantic 4s ease-in-out infinite;
        }
        
        .decorative-hearts:nth-child(2) {
            bottom: -15px;
            left: -15px;
            top: auto;
            right: auto;
            animation-delay: 2s;
        }
        
        @keyframes romantic {
            0%, 100% {
                opacity: 0.2;
                transform: rotate(0deg) scale(1);
            }
            50% {
                opacity: 0.6;
                transform: rotate(15deg) scale(1.1);
            }
        }
        
        .testimonial-preview {
            background: linear-gradient(135deg, rgba(253, 126, 20, 0.1) 0%, rgba(230, 57, 70, 0.1) 100%);
            border-radius: 20px;
            padding: 2rem;
            margin: 2rem 0;
            border-left: 4px solid #fd7e14;
        }
        
        .testimonial-text {
            font-style: italic;
            color: #333;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        .testimonial-author {
            color: #fd7e14;
            font-weight: 600;
            text-align: right;
        }
        
        @media (max-width: 768px) {
            .stories-container {
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
            
            .success-features {
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
    
    <div class="top-nav">
        <a href="{{ route('home') }}">HOME</a>
        <a href="#">ACTIVE MEMBERS</a>
        <a href="#">PREMIUM PLANS</a>
        <a href="#" style="color: #fd7e14; font-weight: bold;">HAPPY STORIES</a>
        <a href="#">CONTACT US</a>
    </div>
    
    <div class="main-container">
        <div class="stories-container">
            <div class="decorative-hearts">💕💖</div>
            <div class="decorative-hearts">💝🥰</div>
            
            <div class="stories-icon">📖</div>
            
            <h1 class="greeting">Hi!</h1>
            <p class="subtitle">Welcome to our Happy Stories Collection</p>
            
            <div class="stories-message">
                Discover beautiful love stories from couples who found their perfect match through Ina Matrimony. Be inspired by their journeys and share your own success story!
            </div>
            
            <div class="testimonial-preview">
                <div class="testimonial-text">
                    "We found each other through Ina Matrimony and couldn't be happier! The platform made it so easy to connect with like-minded people. Today marks our 2nd wedding anniversary!"
                </div>
                <div class="testimonial-author">- Arjun & Priya, Married 2023</div>
            </div>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">2,547</div>
                    <div class="stat-label">Happy Couples</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">156</div>
                    <div class="stat-label">Success Stories</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Success Rate</div>
                </div>
            </div>
            
            <div class="success-features">
                <div class="feature-card">
                    <h4>💑 Real Love Stories</h4>
                    <p>Read authentic testimonials from couples who found their soulmates through our platform.</p>
                </div>
                <div class="feature-card">
                    <h4>📸 Wedding Albums</h4>
                    <p>Browse through beautiful wedding photos shared by our successful couples.</p>
                </div>
                <div class="feature-card">
                    <h4>🎥 Video Testimonials</h4>
                    <p>Watch heartwarming video messages from newlyweds sharing their journey.</p>
                </div>
                <div class="feature-card">
                    <h4>✍️ Share Your Story</h4>
                    <p>Found your perfect match? Share your success story and inspire others!</p>
                </div>
            </div>
            
            <div class="action-buttons">
                <a href="{{ route('messaging') }}" class="btn btn-primary">
                    💬 Messaging
                </a>
                <a href="{{ route('shortlist') }}" class="btn btn-secondary">
                    ⭐ Shortlist
                </a>
                <a href="{{ route('my-interest') }}" class="btn btn-outline">
                    ❤️ My Interest
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline">
                    🏠 Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>