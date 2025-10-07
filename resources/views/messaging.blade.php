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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
        }
        
        .header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .logo-text {
            font-size: 1.8rem;
            font-weight: bold;
            color: #e91e63;
            font-family: 'Georgia', serif;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        
        .help-line {
            color: #999;
            font-size: 0.9rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }
        
        .username {
            color: #e91e63;
            font-weight: 600;
        }
        
        .logout-btn {
            background: #e91e63;
            color: white;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background: #c2185b;
        }
        
        .nav-bar {
            background: white;
            padding: 0 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            gap: 2rem;
            overflow-x: auto;
        }
        
        .nav-link {
            color: #333;
            text-decoration: none;
            padding: 1rem 0;
            font-weight: 500;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .nav-link:hover {
            color: #e91e63;
        }
        
        .sub-nav-bar {
            background: white;
            padding: 0 2rem;
            display: flex;
            gap: 2rem;
            overflow-x: auto;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .sub-nav-link {
            color: #666;
            text-decoration: none;
            padding: 1rem 0;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            white-space: nowrap;
            font-size: 0.95rem;
        }
        
        .sub-nav-link:hover {
            color: #e91e63;
        }
        
        .sub-nav-link.active {
            color: #e91e63;
            border-bottom-color: #e91e63;
        }
        
        .main-container {
            display: flex;
            max-width: 1400px;
            margin: 2rem auto;
            gap: 2rem;
            padding: 0 2rem;
        }
        
        .sidebar {
            width: 280px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 2rem;
            height: fit-content;
        }
        
        .profile-section {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ddd 0%, #bbb 100%);
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #888;
        }
        
        .profile-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
        }
        
        .public-profile-btn {
            background: #ffe4f0;
            color: #e91e63;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
        }
        
        .menu-list {
            list-style: none;
        }
        
        .menu-item {
            padding: 0.9rem 1rem;
            margin-bottom: 0.3rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            color: #666;
        }
        
        .menu-item:hover {
            background: #f8f9fa;
            color: #e91e63;
        }
        
        .menu-item.active {
            background: #ffe4f0;
            color: #e91e63;
            font-weight: 600;
        }
        
        .content-area {
            flex: 1;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow: hidden;
            display: flex;
            height: calc(100vh - 250px);
        }
        
        .members-section {
            width: 350px;
            border-right: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
        }
        
        .section-header {
            padding: 1.5rem;
            border-bottom: 1px solid #e0e0e0;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }
        
        .members-list {
            flex: 1;
            overflow-y: auto;
        }
        
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 3rem 2rem;
            text-align: center;
            color: #999;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }
        
        .empty-text {
            font-size: 1.1rem;
            font-weight: 500;
        }
        
        .chats-section {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .chat-placeholder {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            text-align: center;
        }
        
        .chat-icon {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            margin-bottom: 2rem;
            color: white;
        }
        
        .chat-message {
            font-size: 1.2rem;
            color: #666;
            font-weight: 500;
        }
        
        @media (max-width: 968px) {
            .main-container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
            }
            
            .content-area {
                flex-direction: column;
                height: auto;
            }
            
            .members-section {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e0e0e0;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <div class="logo-text">Ina</div>
        </div>
        <div class="header-right">
            <div class="help-line">Help Line 90 72 89 40 10</div>
            <div class="user-info">
                <div class="user-avatar">👤</div>
                <span>Hi, <span class="username">SHIFANA</span></span>
                <button class="logout-btn">Logout</button>
            </div>
        </div>
    </div>
    
    <div class="nav-bar">
        <a href="#" class="nav-link">HOME</a>
        <a href="#" class="nav-link">ACTIVE MEMBERS</a>
        <a href="#" class="nav-link">PREMIUM PLANS</a>
        <a href="{{ route('happy-stories') }}" class="nav-link">HAPPY STORIES</a>
        <a href="#" class="nav-link">CONTACT US</a>
    </div>
    
    <div class="sub-nav-bar">
        <a href="{{ route('login') }}" class="sub-nav-link">Dashboard</a>
        <a href="{{ route('my-profile') }}" class="sub-nav-link">My Profile</a>
        <a href="{{ route('my-interest') }}" class="sub-nav-link">My Interest</a>
        <a href="{{ route('shortlist') }}" class="sub-nav-link">Shortlist</a>
        <a href="#" class="sub-nav-link active">Messaging</a>
        <a href="#" class="sub-nav-link">Ignored User List</a>
        <a href="#" class="sub-nav-link">Matched profile</a>
        <a href="#" class="sub-nav-link">Profile Viewers</a>
    </div>
    
    <div class="main-container">
        <aside class="sidebar">
            <div class="profile-section">
                <div class="profile-avatar">👤</div>
                <div class="profile-name">SHIFANA</div>
                <button class="public-profile-btn">Public Profile</button>
            </div>
            
            <ul class="menu-list">
                <li><a href="{{ route('login') }}" class="menu-item">📊 Dashboard</a></li>
                <li><a href="#" class="menu-item">🖼️ Gallery</a></li>
                <li><a href="{{ route('happy-stories') }}" class="menu-item">📖 Happy Story</a></li>
                <li><a href="#" class="menu-item">📦 Packages</a></li>
                <li><a href="#" class="menu-item">💰 My Wallet</a></li>
                <li><a href="#" class="menu-item active">💬 Message</a></li>
                <li><a href="{{ route('my-interest') }}" class="menu-item">❤️ My Interest</a></li>
                <li><a href="{{ route('shortlist') }}" class="menu-item">📋 Shortlist</a></li>
            </ul>
        </aside>
        
        <main class="content-area">
            <div class="members-section">
                <div class="section-header">Members</div>
                <div class="members-list">
                    <div class="empty-state">
                        <div class="empty-icon">☹️</div>
                        <div class="empty-text">Nothing Found</div>
                    </div>
                </div>
            </div>
            
            <div class="chats-section">
                <div class="section-header">Chats</div>
                <div class="chat-placeholder">
                    <div class="chat-icon">👤</div>
                    <div class="chat-message">Select a Member to view chats</div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>