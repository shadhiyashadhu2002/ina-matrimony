<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ina Matrimony</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .top-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0.75rem 2rem;
            background: #f8f9fa;
            gap: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }
        
        .help-line {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .notification-icon {
            position: relative;
            cursor: pointer;
        }
        
        .notification-icon::before {
            content: '🔔';
            font-size: 1.2rem;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #e91e63;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .user-name {
            color: #e91e63;
            font-weight: 600;
        }
        
        .btn-logout {
            background: linear-gradient(135deg, #e91e63 0%, #ac0742 100%);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(233, 30, 99, 0.3);
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }
        
        .nav-left {
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .logo img {
            height: 50px;
            width: auto;
        }
        
        .header-stats {
            display: flex;
            gap: 1rem;
        }
        
        .header-stat-box {
            background: white;
            border: 2px solid #e91e63;
            border-radius: 10px;
            padding: 0.5rem 0.75rem;
            text-align: center;
            min-width: 80px;
            transition: all 0.3s;
        }
        
        .header-stat-box:hover {
            background: #e91e63;
            color: white;
            transform: translateY(-2px);
        }
        
        .header-stat-number {
            font-weight: bold;
            font-size: 1.1rem;
            color: #e91e63;
        }
        
        .header-stat-box:hover .header-stat-number {
            color: white;
        }
        
        .header-stat-label {
            font-size: 0.75rem;
            color: #6c757d;
            line-height: 1.2;
        }
        
        .header-stat-box:hover .header-stat-label {
            color: white;
        }
        
        @media (max-width: 1200px) {
            .header-stats {
                gap: 0.5rem;
            }
            .header-stat-box {
                min-width: 70px;
                padding: 0.4rem 0.6rem;
            }
            .header-stat-number {
                font-size: 1rem;
            }
            .header-stat-label {
                font-size: 0.7rem;
            }
        }
        
        @media (max-width: 768px) {
            .nav-left {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            .header-stats {
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            .header-stat-box {
                min-width: 60px;
                padding: 0.3rem 0.5rem;
            }
        }
        
        .logo-circle {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #e91e63 0%, #ac0742 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(233, 30, 99, 0.3);
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }
        
        .nav-links a:hover {
            color: #e91e63;
            background: rgba(233, 30, 99, 0.1);
        }
        
        .dashboard-nav {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 2rem;
            overflow-x: auto;
        }
        
        .dashboard-nav a {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6c757d;
            text-decoration: none;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.3s;
            white-space: nowrap;
            font-weight: 500;
        }
        
        .dashboard-nav a:hover {
            background: rgba(233, 30, 99, 0.1);
            color: #e91e63;
        }
        
        .dashboard-nav a.active {
            background: linear-gradient(135deg, rgba(233, 30, 99, 0.1) 0%, rgba(172, 7, 66, 0.1) 100%);
            color: #e91e63;
            border-left: 3px solid #e91e63;
        }
        
        .container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
        }
        
        .sidebar {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            height: fit-content;
            animation: slideRight 0.5s ease-out;
        }
        
        @keyframes slideRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .profile-card {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 3rem;
            color: white;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
        }
        
        .profile-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .profile-verified {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            box-shadow: 0 2px 10px rgba(40, 167, 69, 0.3);
        }
        
        .profile-verified::before {
            content: '✓';
            font-size: 1rem;
            font-weight: bold;
        }
        
        .btn-public-profile {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 100%);
            color: #c2185b;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }
        
        .btn-public-profile:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(194, 24, 91, 0.2);
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #6c757d;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .sidebar-menu a:hover {
            background: rgba(233, 30, 99, 0.1);
            color: #e91e63;
            transform: translateX(5px);
        }
        
        .sidebar-menu a.active {
            background: linear-gradient(135deg, rgba(233, 30, 99, 0.15) 0%, rgba(172, 7, 66, 0.15) 100%);
            color: #e91e63;
            border-left: 3px solid #e91e63;
        }
        
        .btn-logout-sidebar {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #e91e63 0%, #ac0742 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-logout-sidebar:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(233, 30, 99, 0.3);
        }
        
        .main-content {
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #e91e63 0%, #ac0742 100%);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #e91e63;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 1rem;
        }
        
        .package-section {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .package-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .package-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }
        
        .verified-badge {
            width: 150px;
            height: auto;
        }
        
        .package-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        
        .package-logo {
            text-align: center;
        }
        
        .logo-large {
            width: 200px;
            height: auto;
            margin-bottom: 1rem;
        }
        
        .package-type {
            font-size: 2rem;
            font-weight: 700;
            color: #6c757d;
            margin-bottom: 1.5rem;
        }
        
        .package-features {
            list-style: none;
        }
        
        .package-features li {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 1.1rem;
            color: #495057;
        }
        
        .package-features li::before {
            content: '✓';
            color: #28a745;
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .package-expiry {
            margin-top: 2rem;
            padding: 1rem;
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            border-radius: 8px;
            color: #856404;
            font-weight: 500;
        }
        
        .btn-upgrade {
            margin-top: 1.5rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }
        
        .btn-upgrade:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
        }
        
        .matches-section {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1.5rem;
        }
        
        .profile-grid {
            display: grid;
            gap: 1.5rem;
        }
        
        .profile-item {
            display: grid;
            grid-template-columns: 100px 1fr;
            gap: 1.5rem;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .profile-item:hover {
            background: white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transform: translateX(5px);
        }
        
        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            background: #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            overflow: hidden;
        }
        
        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .profile-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .profile-name-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }
        
        .profile-info {
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        @media (max-width: 1024px) {
            .layout {
                grid-template-columns: 1fr;
            }
            
            .package-content {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 0.5rem;
            }
            
            .stat-card {
                padding: 1rem;
            }
            
            .stat-number {
                font-size: 1.5rem;
            }
            
            .stat-label {
                font-size: 0.8rem;
            }
            
            .nav-links {
                display: none;
            }
        }
        
        @media (max-width: 480px) {
            .stats-grid {
                gap: 0.25rem;
            }
            
            .stat-card {
                padding: 0.75rem 0.5rem;
            }
            
            .stat-number {
                font-size: 1.2rem;
            }
            
            .stat-label {
                font-size: 0.7rem;
                line-height: 1.1;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="top-bar">
            <span class="help-line">Help Line 90 72 89 40 10</span>
            <div class="notification-icon">
                <span class="notification-badge">3</span>
            </div>
            <div class="user-info">
                <div class="user-avatar">👤</div>
                <span class="user-name">Hi, SHIFANA</span>
            </div>
            <button class="btn-logout">Logout</button>
        </div>
        
        <nav>
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Ina Matrimony">
            </div>
            <div class="nav-links">
                <a href="#">HOME</a>
                <a href="#">ACTIVE MEMBERS</a>
                <a href="#">PREMIUM PLANS</a>
                <a href="#">HAPPY STORIES</a>
                <a href="#">CONTACT US</a>
            </div>
        </nav>
        
        <div class="dashboard-nav">
            <a href="#" class="active">🏠 Dashboard</a>
            <a href="{{ route('my-profile') }}">👤 My Profile</a>
            <a href="#">❤️ My Interest</a>
            <a href="#">⭐ Shortlist</a>
            <a href="#">💬 Messaging</a>
            <a href="#">🚫 Ignored User List</a>
            <a href="#">🤝 Matched profile</a>
            <a href="#">👁️ Profile Viewers</a>
        </div>
    </header>
    
    <div class="container">
        <div class="layout">
            <aside class="sidebar">
                <div class="profile-card">
                    <div class="profile-avatar">👤</div>
                    <div class="profile-name">SHIFANA .</div>
                    <div class="profile-verified">VERIFIED</div>
                    <button class="btn-public-profile">Public Profile</button>
                </div>
                
                <ul class="sidebar-menu">
                    <li><a href="#" class="active">🏠 Dashboard</a></li>
                    <li><a href="#">🖼️ Gallery</a></li>
                    <li><a href="#">📖 Happy Story</a></li>
                    <li><a href="#">📦 Packages</a></li>
                    <li><a href="#">💰 My Wallet</a></li>
                    <li><a href="#">💬 Message</a></li>
                    <li><a href="#">❤️ My Interest</a></li>
                    <li><a href="#">⭐ Shortlist</a></li>
                    <li><a href="#">🚫 Ignored User List</a></li>
                    <li><a href="#">🔑 Change Password</a></li>
                    <li><a href="#">⚙️ Manage Profile</a></li>
                    <li><a href="#">🔒 Deactive Account</a></li>
                    <li><a href="#">🗑️ Delete Account</a></li>
                </ul>
                
                <button class="btn-logout-sidebar">
                    🚪 Logout
                </button>
            </aside>
            
            <main class="main-content">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">❤️</div>
                        <div class="stat-number">50</div>
                        <div class="stat-label">Remaining<br>Interest</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">📞</div>
                        <div class="stat-number">0</div>
                        <div class="stat-label">Remaining<br>Contact View</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">📞</div>
                        <div class="stat-number">2</div>
                        <div class="stat-label">Remaining<br>Profile Viewer View</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">🖼️</div>
                        <div class="stat-number">5</div>
                        <div class="stat-label">Remaining<br>Gallery Image Upload</div>
                    </div>
                </div>
                
                <div class="package-section">
                    <div class="package-header">
                        <h2 class="package-title">Current package</h2>
                    </div>
                    
                    <div class="package-content">
                        <div class="package-logo">
                            <div class="logo-circle" style="width: 120px; height: 120px; font-size: 3rem; margin: 0 auto;">i</div>
                            <div class="package-type">TRIAL</div>
                        </div>
                        
                        <div>
                            <ul class="package-features">
                                <li>50 Express Interests</li>
                                <li>5 Gallery Photo Upload</li>
                                <li>0 Contact Info View</li>
                                <li>2 Profile Viewer View</li>
                                <li>Show Auto Profile Match</li>
                            </ul>
                            
                            <div class="package-expiry">
                                ⏰ Package expiry date: 2026-10-06
                            </div>
                            
                            <button class="btn-upgrade">Upgrade Package</button>
                        </div>
                    </div>
                </div>
                
                <div class="matches-section">
                    <h2 class="section-title">Matched profile</h2>
                    
                    <div class="profile-grid">
                        <div class="profile-item">
                            <div class="profile-photo">👤</div>
                            <div class="profile-details">
                                <div class="profile-name-title">FAUL RAHMAN</div>
                                <div class="profile-info">31 yrs, 5'7 Feet, Unmarried, Islam, Sunni, muslim</div>
                            </div>
                        </div>
                        
                        <div class="profile-item">
                            <div class="profile-photo">
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                            </div>
                            <div class="profile-details">
                                <div class="profile-name-title">SAHAL MALAPPURAM</div>
                                <div class="profile-info">26 yrs, 5'6 Feet, Unmarried, Islam, Sunni, muslim</div>
                            </div>
                        </div>
                        
                        <div class="profile-item">
                            <div class="profile-photo">👤</div>
                            <div class="profile-details">
                                <div class="profile-name-title">FARIS RAHMAN</div>
                                <div class="profile-info">28 yrs, 5'7 Feet, Unmarried, Islam, Sunni, muslim</div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>