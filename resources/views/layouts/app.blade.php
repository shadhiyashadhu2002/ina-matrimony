<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Application')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @yield('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Figtree', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ac0742;
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #666;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #ac0742;
        }
        
        .auth-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .btn-login {
            padding: 8px 20px;
            background: #ac0742;
            color: white;
            border: none;
            border-radius: 20px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }
        
        .btn-login:hover {
            background: #8a0635;
            transform: translateY(-2px);
            color: white;
        }
        
        main {
            min-height: calc(100vh - 140px);
        }
        
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            .btn-login {
                padding: 6px 16px;
                font-size: 13px;
            }
        }
        
        footer {
            background: #f8f9fa;
            text-align: center;
            padding: 2rem;
            color: #666;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">INA Matrimony</a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="auth-section">
                <a href="#" class="btn-login">Login</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} INA Matrimony. Built with ❤️ using Laravel {{ app()->version() }}</p>
    </footer>

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>