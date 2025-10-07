<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Interest - Ina Matrimony</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
        }
        
        .header {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 2rem;
            color: #e91e63;
            font-weight: bold;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
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
            background: #e91e63;
            color: white;
        }
        
        .nav-tabs {
            background: white;
            padding: 0 2rem;
            display: flex;
            gap: 2rem;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .nav-tab {
            padding: 1rem 0;
            color: #666;
            text-decoration: none;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }
        
        .nav-tab.active {
            color: #e91e63;
            border-bottom-color: #e91e63;
        }
        
        .container {
            max-width: 1400px;
            margin: 2rem auto;
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
            padding: 0 2rem;
        }
        
        .sidebar {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            height: fit-content;
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: #ddd;
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #999;
        }
        
        .profile-name {
            text-align: center;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .profile-badge {
            background: #fce4ec;
            color: #e91e63;
            padding: 0.5rem;
            border-radius: 4px;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-menu li {
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .sidebar-menu li:hover {
            background: #f5f5f5;
        }
        
        .sidebar-menu li.active {
            background: #fce4ec;
            color: #e91e63;
        }
        
        .sidebar-logout {
            background: #dc3545;
            color: white;
            padding: 0.75rem;
            border-radius: 4px;
            text-align: center;
            margin-top: 2rem;
            cursor: pointer;
        }
        
        .main-content {
            background: white;
            border-radius: 8px;
            padding: 2rem;
        }
        
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .content-title {
            font-size: 1.5rem;
            color: #333;
            font-weight: 600;
        }
        
        .interest-request-btn {
            background: #dc3545;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .interest-request-btn:hover {
            background: #c82333;
        }
        
        .tab-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .tab-btn {
            padding: 1rem 2rem;
            border: none;
            background: transparent;
            color: #666;
            font-size: 1rem;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            font-weight: 500;
        }
        
        .tab-btn.active {
            color: #e91e63;
            border-bottom-color: #e91e63;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .interest-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        .interest-table th,
        .interest-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .interest-table th {
            background: #f5f5f5;
            font-weight: 600;
            color: #666;
            font-size: 0.9rem;
        }
        
        .profile-image {
            width: 50px;
            height: 50px;
            background: #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #999;
        }
        
        .action-icons {
            display: flex;
            gap: 0.5rem;
        }
        
        .icon-btn {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .icon-btn.accept {
            background: #d4edda;
            color: #28a745;
        }
        
        .icon-btn.reject {
            background: #ffebee;
            color: #f44336;
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }
        
        .empty-icon {
            font-size: 5rem;
            color: #ccc;
            margin-bottom: 1rem;
        }
        
        .empty-text {
            font-size: 1.2rem;
            color: #666;
        }
        
        @media (max-width: 968px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .content-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">ina MATRIMONY</div>
        <div class="user-info">
            <span>Hi, <strong style="color: #e91e63;">SHIFANA</span>
            <button class="logout-btn">Logout</button>
        </div>
    </div>
    
    <div class="top-nav">
        <a href="{{ route('home') }}">HOME</a>
        <a href="#">ACTIVE MEMBERS</a>
        <a href="#">PREMIUM PLANS</a>
        <a href="{{ route('happy-stories') }}">HAPPY STORIES</a>
        <a href="#">CONTACT US</a>
    </div>
    
    <div class="nav-tabs">
        <a href="#" class="nav-tab">Dashboard</a>
        <a href="{{ route('my-profile') }}" class="nav-tab">My Profile</a>
        <a href="#" class="nav-tab active">My Interest</a>
        <a href="{{ route('shortlist') }}" class="nav-tab">Shortlist</a>
        <a href="{{ route('messaging') }}" class="nav-tab">Messaging</a>
        <a href="#" class="nav-tab">Ignored User List</a>
        <a href="#" class="nav-tab">Matched profile</a>
        <a href="#" class="nav-tab">Profile Viewers</a>
    </div>
    
    <div class="container">
        <div class="sidebar">
            <div class="profile-avatar">👤</div>
            <div class="profile-name">SHIFANA .</div>
            <div class="profile-badge">Public Profile</div>
            
            <ul class="sidebar-menu">
                <li>📊 Dashboard</li>
                <li>🖼️ Gallery</li>
                <li>📖 Happy Story</li>
                <li>📦 Packages</li>
                <li>💰 My Wallet</li>
                <li>💬 Message</li>
                <li class="active">❤️ My Interest</li>
                <li>📋 Shortlist</li>
                <li>🚫 Ignored User List</li>
                <li>🔑 Change Password</li>
                <li>⚙️ Manage Profile</li>
                <li>❌ Deactive Account</li>
                <li>🗑️ Delete Account</li>
            </ul>
            
            <div class="sidebar-logout">⚪ Logout</div>
        </div>
        
        <div class="main-content">
            <div class="content-header">
                <h2 class="content-title" id="pageTitle">My Interests</h2>
                <button class="interest-request-btn" id="interestRequestBtn">Interest Requests</button>
            </div>
            
            <div class="tab-buttons">
                <button class="tab-btn active" data-tab="myInterests">My Interests</button>
                <button class="tab-btn" data-tab="interestRequests">Interest Requests</button>
            </div>
            
            <!-- My Interests Tab -->
            <div class="tab-content active" id="myInterests">
                <table class="interest-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>age</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                <div class="empty-state">
                    <div class="empty-icon">☹️</div>
                    <div class="empty-text">Nothing Found</div>
                </div>
            </div>
            
            <!-- Interest Requests Tab -->
            <div class="tab-content" id="interestRequests">
                <table class="interest-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <div class="profile-image">👤</div>
                            </td>
                            <td>MURSHAD AS</td>
                            <td>27</td>
                            <td>
                                <div class="action-icons">
                                    <button class="icon-btn accept">✓</button>
                                    <button class="icon-btn reject">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script>
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        const pageTitle = document.getElementById('pageTitle');
        const interestRequestBtn = document.getElementById('interestRequestBtn');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.getAttribute('data-tab');
                
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                button.classList.add('active');
                document.getElementById(targetTab).classList.add('active');
                
                if (targetTab === 'myInterests') {
                    pageTitle.textContent = 'My Interests';
                    interestRequestBtn.textContent = 'Interest Requests';
                    interestRequestBtn.style.display = 'block';
                } else {
                    pageTitle.textContent = 'Interest Requests';
                    interestRequestBtn.style.display = 'none';
                }
            });
        });
        
        interestRequestBtn.addEventListener('click', () => {
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            tabButtons[1].classList.add('active');
            document.getElementById('interestRequests').classList.add('active');
            
            pageTitle.textContent = 'Interest Requests';
            interestRequestBtn.style.display = 'none';
        });
    </script>
</body>
</html>