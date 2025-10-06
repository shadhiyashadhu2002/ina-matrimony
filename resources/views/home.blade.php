@extends('layouts.app')

@section('title', 'INA Matrimony - Kerala\'s Most Trusted Matrimony Platform')

@section('styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    

    
    /* Hero Section */
    .hero-section {
        position: relative;
        height: 100vh;
        max-height: 750px;
        min-height: 550px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), 
                    url('/images/home.jfif') center/cover;
        padding: 1rem 2rem 3rem 2rem;
        margin-bottom: 2rem;
    }
    
    .hero-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        gap: 4rem;
        transition: all 0.5s ease-in-out;
    }
    
    .hero-container.form-active {
        justify-content: space-between;
        align-items: flex-start;
        padding-top: 2rem;
    }
    
    .hero-content {
        text-align: center;
        color: white;
        z-index: 10;
        flex: 1;
        max-width: 600px;
        transition: all 0.5s ease-in-out;
    }
    
    .hero-content.form-active {
        text-align: left;
        max-width: 600px;
    }
    
    .registration-form {
        background: linear-gradient(145deg, #ffffff 0%, #f8f9fa 100%);
        padding: 1rem;
        border-radius: 12px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3), 
                    0 10px 25px rgba(172, 7, 66, 0.2),
                    0 0 0 3px rgba(255, 255, 255, 0.8);
        width: 360px;
        flex-shrink: 0;
        opacity: 0;
        visibility: hidden;
        transform: translateX(50px);
        transition: all 0.5s ease-in-out;
        border: 2px solid rgba(255, 255, 255, 0.9);
        position: relative;
        z-index: 30;
        font-family: 'Times New Roman', Times, serif;
    }
    
    .registration-form.show {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 0.8rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid rgba(233, 30, 99, 0.1);
    }
    
    .form-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #e91e63;
        margin-bottom: 0.3rem;
        font-family: 'Times New Roman', Times, serif;
    }
    
    .form-subtitle {
        color: #666;
        font-size: 0.85rem;
        font-weight: 500;
        font-family: 'Times New Roman', Times, serif;
    }
    
    .form-group {
        margin-bottom: 0.5rem;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 0.2rem;
        font-weight: 600;
        color: #444;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        font-family: 'Times New Roman', Times, serif;
    }
    
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.5rem;
        border: 2px solid #e1e5e9;
        border-radius: 6px;
        font-size: 0.8rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
        background: #fafbfc;
        font-family: 'Times New Roman', Times, serif;
    }
    
    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #e91e63;
        background: white;
        box-shadow: 0 0 0 3px rgba(233, 30, 99, 0.1);
        transform: translateY(-1px);
    }
    
    .form-row {
        display: flex;
        gap: 0.3rem;
    }
    
    .form-row .form-group {
        flex: 1;
    }
    
    .password-hint {
        font-size: 0.65rem;
        color: #666;
        margin-top: 0.1rem;
        font-family: 'Times New Roman', Times, serif;
    }
    
    .terms-checkbox {
        display: flex;
        align-items: flex-start;
        gap: 0.3rem;
        margin: 0.4rem 0 0.5rem 0;
        font-size: 0.7rem;
        line-height: 1.2;
        font-family: 'Times New Roman', Times, serif;
    }
    
    .terms-checkbox input[type="checkbox"] {
        width: auto;
        margin-top: 0.2rem;
    }
    
    .terms-checkbox label {
        margin: 0;
        font-weight: normal;
        color: #555;
    }
    
    .terms-checkbox a {
        color: #ac0742;
        text-decoration: none;
    }
    
    .terms-checkbox a:hover {
        text-decoration: underline;
    }
    
    .btn-create-account {
        width: 100%;
        padding: 0.7rem;
        background: linear-gradient(135deg, #e91e63 0%, #ac0742 100%);
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(233, 30, 99, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin-top: 0.2rem;
        font-family: 'Times New Roman', Times, serif;
    }
    
    .btn-create-account:hover {
        background: linear-gradient(135deg, #d81b60 0%, #8a0635 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(233, 30, 99, 0.4);
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.2;
    }
    
    .hero-title .highlight {
        color: #ac0742;
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        margin-bottom: 3rem;
        line-height: 1.6;
        opacity: 0.95;
    }
    
    .hero-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
        transition: all 0.5s ease-in-out;
    }
    
    .hero-buttons.form-active {
        justify-content: flex-start;
    }
    
    .btn-primary {
        padding: 15px 40px;
        background: #ac0742;
        color: white;
        border: none;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-primary:hover {
        background: #8a0635;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(172, 7, 66, 0.3);
    }
    
    .btn-secondary {
        padding: 15px 40px;
        background: transparent;
        color: white;
        border: 2px solid white;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-secondary:hover {
        background: white;
        color: #333;
        transform: translateY(-3px);
    }
    
    /* Registration Info */
    .registration-info {
        margin-top: 1rem;
        text-align: center;
        width: 200px;
        background: none;
        border: none;
        box-shadow: none;
        padding: 0;
    }
    
    .info-main {
        color: #ac0742;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        line-height: 1.3;
        background: none;
        padding: 0;
    }
    
    .info-sub {
        color: #666;
        font-size: 0.8rem;
        font-weight: 400;
        line-height: 1.3;
    }
    
    /* Stats Section */
    .stats-section {
        background: rgba(172, 7, 66, 0.95);
        padding: 3rem 2rem;
        margin-top: 2rem;
        position: relative;
        z-index: 20;
    }
    
    .stats-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
        text-align: center;
        color: white;
    }
    
    .stat-item h3 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    
    .stat-item p {
        font-size: 1.2rem;
        opacity: 0.95;
    }
    
    /* Features Section */
    .features-section {
        padding: 5rem 2rem;
        background: #f9f9f9;
    }
    
    .section-title {
        text-align: center;
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 1rem;
    }
    
    .section-subtitle {
        text-align: center;
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 4rem;
    }
    
    .features-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
    }
    
    .feature-card {
        background: white;
        padding: 2.5rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        border-top: 4px solid #ac0742;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    
    .feature-icon {
        font-size: 3.5rem;
        margin-bottom: 1.5rem;
    }
    
    .feature-title {
        font-size: 1.4rem;
        color: #333;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .feature-description {
        color: #666;
        line-height: 1.6;
    }
    
    /* Image-only circular feature cards */
    .feature-card.image-only {
        background: none;
        border: 3px solid #ac0742;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        padding: 0;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        flex-shrink: 0;
        flex-direction: column;
    }
    
    /* Special styling for circles with text */
    .feature-card.image-only:first-child,
    .feature-card.image-only:nth-child(2),
    .feature-card.image-only:nth-child(3),
    .feature-card.image-only:nth-child(4),
    .feature-card.image-only:nth-child(5) {
        height: auto;
        flex-direction: column;
        overflow: visible;
        border-radius: 0;
        border: none;
        background: transparent;
    }
    
    .feature-card.image-only:first-child .feature-icon,
    .feature-card.image-only:nth-child(2) .feature-icon,
    .feature-card.image-only:nth-child(3) .feature-icon,
    .feature-card.image-only:nth-child(4) .feature-icon,
    .feature-card.image-only:nth-child(5) .feature-icon {
        border: 3px solid #ac0742;
        border-radius: 50%;
        overflow: hidden;
        width: 120px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .feature-card.image-only .feature-icon {
        width: 100%;
        height: 100%;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .feature-card.image-only .feature-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
    
    /* Featured Profiles Section */
    .featured-profiles-section {
        padding: 4rem 2rem;
        background-color: #fff;
    }
    
    .profiles-container {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
    }
    
    .profiles-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }
    
    .profile-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f0f0f0;
    }
    
    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }
    
    .profile-image {
        width: 100%;
        height: 250px;
        background: linear-gradient(45deg, #f8f9fa, #e9ecef);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .profile-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .profile-image .placeholder {
        font-size: 4rem;
        color: #ac0742;
        opacity: 0.3;
    }
    
    .profile-info {
        padding: 1.5rem;
    }
    
    .profile-name {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
    }
    
    .profile-id {
        color: #ac0742;
        font-weight: 500;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .profile-details {
        color: #666;
        font-size: 0.85rem;
        margin-bottom: 1rem;
        font-style: italic;
    }
    
    .profile-details {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .profile-tag {
        background: #f8f9fa;
        color: #666;
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-size: 0.85rem;
        border: 1px solid #e9ecef;
    }
    
    .profile-actions {
        display: flex;
        gap: 0.5rem;
    }
    
    .btn-view-profile {
        flex: 1;
        padding: 0.75rem;
        background: #ac0742;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }
    
    .btn-view-profile:hover {
        background: #8a0635;
    }
    
    .btn-interest {
        padding: 0.75rem;
        background: transparent;
        color: #ac0742;
        border: 2px solid #ac0742;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-interest:hover {
        background: #ac0742;
        color: white;
    }
    
    .view-more-container {
        margin-top: 3rem;
    }
    
    .btn-view-more {
        padding: 1rem 2.5rem;
        background: transparent;
        color: #ac0742;
        border: 2px solid #ac0742;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-view-more:hover {
        background: #ac0742;
        color: white;
        transform: translateY(-2px);
    }
    
    .loading-spinner {
        display: none;
        text-align: center;
        padding: 2rem;
        color: #ac0742;
    }

    /* CTA Section */
    .cta-section {
        background: linear-gradient(135deg, #ac0742 0%, #8a0635 100%);
        padding: 5rem 2rem;
        text-align: center;
        color: white;
    }
    
    .cta-content {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .cta-section h2 {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }
    
    .cta-section p {
        font-size: 1.2rem;
        margin-bottom: 2.5rem;
        opacity: 0.95;
    }
    
    /* Footer */
    .footer {
        background: #2c2c2c;
        color: white;
        padding: 3rem 2rem 1rem;
    }
    
    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }
    
    .footer-section h3 {
        margin-bottom: 1rem;
        color: #ac0742;
    }
    
    .footer-section ul {
        list-style: none;
    }
    
    .footer-section ul li {
        margin-bottom: 0.5rem;
    }
    
    .footer-section a {
        color: #ccc;
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .footer-section a:hover {
        color: #ac0742;
    }
    
    .footer-bottom {
        text-align: center;
        padding-top: 2rem;
        border-top: 1px solid #444;
        color: #999;
    }
    
    @media (max-width: 1200px) {
        .hero-container,
        .hero-container.form-active {
            flex-direction: column;
            gap: 2rem;
            align-items: center;
            justify-content: center;
        }
        
        .hero-content,
        .hero-content.form-active {
            text-align: center;
            max-width: 100%;
        }
        
        .hero-buttons,
        .hero-buttons.form-active {
            justify-content: center;
        }
        
        .registration-form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .hero-section {
            padding: 1rem;
            min-height: auto;
        }
        
        .registration-form {
            padding: 1.5rem;
        }
        
        .form-row {
            flex-direction: column;
            gap: 0;
        }
        
        .stats-container {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const registerBtn = document.querySelector('.btn-primary');
    const registrationForm = document.querySelector('.registration-form');
    const heroContainer = document.querySelector('.hero-container');
    const heroContent = document.querySelector('.hero-content');
    const heroButtons = document.querySelector('.hero-buttons');
    
    registerBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        if (registrationForm.classList.contains('show')) {
            // Hide form and center content
            registrationForm.classList.remove('show');
            heroContainer.classList.remove('form-active');
            heroContent.classList.remove('form-active');
            heroButtons.classList.remove('form-active');
        } else {
            // Show form and move content to left
            registrationForm.classList.add('show');
            heroContainer.classList.add('form-active');
            heroContent.classList.add('form-active');
            heroButtons.classList.add('form-active');
        }
    });
    
    // Load featured profiles on page load
    loadProfiles();
});

function loadProfiles() {
    const profilesGrid = document.getElementById('profilesGrid');
    if (!profilesGrid) return;
    
    profilesGrid.innerHTML = '<div class="loading-spinner" style="display: block;">Loading profiles...</div>';
    
    // Fetch profiles from server
    fetch('/api/featured-profiles')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayProfiles(data.profiles || []);
            } else {
                console.error('API Error:', data.error);
                displaySampleProfiles();
            }
        })
        .catch(error => {
            console.error('Error loading profiles:', error);
            displaySampleProfiles(); // Show sample data if API fails
        });
}

function displayProfiles(profiles) {
    const profilesGrid = document.getElementById('profilesGrid');
    if (!profilesGrid) return;
    
    if (profiles.length === 0) {
        displaySampleProfiles();
        return;
    }
    
    const profilesHtml = profiles.map(profile => `
        <div class="profile-card">
            <div class="profile-image">
                ${profile.photo ? 
                    `<img src="${profile.photo}" alt="${profile.name}" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                     <div class="placeholder" style="display:none;">👤</div>` : 
                    '<div class="placeholder">👤</div>'
                }
            </div>
            <div class="profile-info">
                <h3 class="profile-name">${profile.name}</h3>
                <p class="profile-id">ID: ${profile.code}</p>
                <p class="profile-details">${profile.age} yrs • ${profile.occupation}</p>
                <div class="profile-actions">
                    <a href="/profile/${profile.code}" class="btn-view-profile">View Profile</a>
                    <button class="btn-interest" onclick="sendInterest('${profile.code}')">♡</button>
                </div>
            </div>
        </div>
    `).join('');
    
    profilesGrid.innerHTML = profilesHtml;
}

function displaySampleProfiles() {
    const sampleProfiles = [
        { id: 1, name: 'Priya S.', member_id: 'INA001', age: 28, profession: 'Software Engineer', location: 'Kochi' },
        { id: 2, name: 'Arjun M.', member_id: 'INA002', age: 32, profession: 'Doctor', location: 'Trivandrum' },
        { id: 3, name: 'Meera K.', member_id: 'INA003', age: 26, profession: 'Teacher', location: 'Kozhikode' },
        { id: 4, name: 'Rohit P.', member_id: 'INA004', age: 30, profession: 'Business', location: 'Thrissur' },
        { id: 5, name: 'Anjali R.', member_id: 'INA005', age: 29, profession: 'Nurse', location: 'Kottayam' },
        { id: 6, name: 'Vishnu N.', member_id: 'INA006', age: 31, profession: 'Engineer', location: 'Palakkad' }
    ];
    
    displayProfiles(sampleProfiles);
}

function loadMoreProfiles() {
    alert('Load more profiles feature will be implemented in the backend.');
}

function sendInterest(profileId) {
    alert(`Interest sent to profile ID: ${profileId}`);
}
</script>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-container">
        <div class="hero-content">
            <h1 class="hero-title">
                Connecting Hearts,<br>
                <span class="highlight">Building Families</span>
            </h1>
            <p class="hero-subtitle">
                Kerala's most trusted matrimony platform where tradition meets modern matchmaking. 
                Find your perfect life partner with our personalized approach.
            </p>
            <div class="hero-buttons">
                <a href="/register" class="btn-primary">Register Free Today</a>
                <a href="/login" class="btn-secondary">Login</a>
                <a href="/premium" class="btn-secondary">Upgrade to Premium</a>
            </div>
        </div>
        
        <!-- Registration Form -->
        <div class="registration-form" id="registrationForm">
            <div class="form-header">
                <h2 class="form-title">Create Your Account</h2>
                <p class="form-subtitle">Fill out the form to get started</p>
            </div>
            
            <form action="/register" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="on_behalf">On Behalf</label>
                    <select id="on_behalf" name="on_behalf" required>
                        <option value="">Select an option</option>
                        <option value="self">Self</option>
                        <option value="parents">Parents</option>
                        <option value="guardian">Guardian</option>
                    </select>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email_phone">Email or Phone Number</label>
                    <input type="text" id="email_phone" name="email_phone" placeholder="Enter email or phone number" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="password-hint">Minimum 8 characters should be there</div>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                
                <div class="terms-checkbox">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">By signing up, you agree to our <a href="/terms" target="_blank">Terms and Conditions</a></label>
                </div>
                
                <button type="submit" class="btn-create-account">Create Account</button>
            </form>
        </div>
    </div>
</section>

<!-- Featured Profiles Section -->
<section class="featured-profiles-section">
    <div class="profiles-container">
        <h2 class="section-title">Featured Profiles</h2>
        <p class="section-subtitle">Meet some of our verified members</p>
        
        <div class="profiles-grid" id="profilesGrid">
            <!-- Profiles will be loaded here -->
        </div>
        
        <div class="view-more-container">
            <button class="btn-view-more" onclick="loadMoreProfiles()">View More Profiles</button>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-item">
            <h3>50,000+</h3>
            <p>Happy Couples</p>
        </div>
        <div class="stat-item">
            <h3>2L+</h3>
            <p>Verified Profiles</p>
        </div>
        <div class="stat-item">
            <h3>15+</h3>
            <p>Years of Trust</p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <h2 class="section-title">Why Choose INA Matrimony?</h2>
    <p class="section-subtitle">Trusted by thousands of families across World</p>
    
    <div class="features-grid">
        <div class="feature-card image-only">
            <div class="feature-icon">
                <img src="{{ asset('images/free.jfif') }}" alt="Free Registration">
            </div>
            <div class="registration-info">
                <p class="info-main">Join for free and start your journey to a meaningful relationship.</p>
            </div>
        </div>
        
        <div class="feature-card image-only">
            <div class="feature-icon">
                <img src="{{ asset('images/verified.jfif') }}" alt="Verified Profiles">
            </div>
            <div class="registration-info">
                <p class="info-main">Verified profiles — real people, real connections.</p>
            </div>
        </div>
        
        <div class="feature-card image-only">
            <div class="feature-icon">
                <img src="{{ asset('images/security.jfif') }}" alt="Security">
            </div>
            <div class="registration-info">
                <p class="info-main">Your privacy is our priority — protected with advanced security.</p>
            </div>
        </div>
        
        <div class="feature-card image-only">
            <div class="feature-icon">
                <img src="{{ asset('images/reach.jfif') }}" alt="Community Reach">
            </div>
            <div class="registration-info">
                <p class="info-main">Find your match from our vast global community</p>
            </div>
        </div>
        
        <div class="feature-card image-only">
            <div class="feature-icon">
                <img src="{{ asset('images/success.jfif') }}" alt="Success Stories">
            </div>
            <div class="registration-info">
                <p class="info-main">Thousands found love here — your story could be next!</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2>Ready to Find Your Life Partner?</h2>
        <p>Join thousands of verified profiles and start your journey to a happy married life today!</p>
        <a href="/register" class="btn-primary">Create Your Profile Now</a>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>About Us</h3>
            <ul>
                <li><a href="/about">Our Story</a></li>
                <li><a href="/success-stories">Success Stories</a></li>
                <li><a href="/testimonials">Testimonials</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/search">Search Profiles</a></li>
                <li><a href="/membership">Membership Plans</a></li>
                <li><a href="/help">Help & Support</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h3>Legal</h3>
            <ul>
                <li><a href="/privacy">Privacy Policy</a></li>
                <li><a href="/terms">Terms of Service</a></li>
                <li><a href="/refund">Refund Policy</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h3>Contact</h3>
            <ul>
                <li>Email: info@inamatrimony.com</li>
                <li>Phone: +91 123 456 7890</li>
                <li>Kerala, India</li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} INA Matrimony. All rights reserved.</p>
    </div>
</footer>
@endsection