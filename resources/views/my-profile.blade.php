<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Ina Matrimony</title>
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
            background: #dc3545;
            color: white;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
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
        
        .section {
            margin-bottom: 3rem;
        }
        
        .section-title {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-label {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-label span {
            color: #dc3545;
        }
        
        .form-input, .form-select, .form-textarea {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border 0.3s;
        }
        
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #e91e63;
        }
        
        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .update-btn {
            background: #dc3545;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            float: right;
            margin-top: 1rem;
        }
        
        .verify-btn {
            background: white;
            color: #333;
            padding: 0.75rem 2rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
        }
        
        .education-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        .education-table th,
        .education-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .education-table th {
            background: #f5f5f5;
            font-weight: 600;
            color: #666;
            font-size: 0.9rem;
        }
        
        .add-new-btn {
            background: #dc3545;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            margin-top: 1rem;
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
        
        .icon-btn.edit {
            background: #e3f2fd;
            color: #2196f3;
        }
        
        .icon-btn.delete {
            background: #ffebee;
            color: #f44336;
        }
        
        .photo-upload {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .browse-btn {
            background: #dc3545;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .choose-file-btn {
            background: #f5f5f5;
            padding: 0.75rem 1.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
        }
        
        @media (max-width: 968px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
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
    
    <div class="nav-tabs">
        <a href="#" class="nav-tab">Dashboard</a>
        <a href="#" class="nav-tab active">My Profile</a>
        <a href="#" class="nav-tab">My Interest</a>
        <a href="#" class="nav-tab">Shortlist</a>
        <a href="#" class="nav-tab">Messaging</a>
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
                <li>❤️ My Interest</li>
                <li>📋 Shortlist</li>
                <li>🚫 Ignored User List</li>
                <li>🔑 Change Password</li>
                <li class="active">⚙️ Manage Profile</li>
                <li>❌ Deactive Account</li>
                <li>🗑️ Delete Account</li>
            </ul>
            
            <div class="sidebar-logout">⚪ Logout</div>
        </div>
        
        <div class="main-content">
            <!-- Introduction Section -->
            <div class="section">
                <h2 class="section-title">Introduction</h2>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label class="form-label">Introduction</label>
                        <textarea class="form-textarea" placeholder="Introduction"></textarea>
                    </div>
                </div>
                <button class="update-btn">Update</button>
                <div style="clear: both;"></div>
            </div>
            
            <!-- Change Email Section -->
            <div class="section">
                <h2 class="section-title">Change your email</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Your Email</label>
                        <input type="email" class="form-input" value="SHIFANA9495@gmail.com">
                    </div>
                    <div class="form-group" style="display: flex; align-items: flex-end;">
                        <button class="verify-btn">Verify</button>
                    </div>
                </div>
                <button class="update-btn">Update</button>
                <div style="clear: both;"></div>
            </div>
            
            <!-- Basic Information Section -->
            <div class="section">
                <h2 class="section-title">Basic Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">First Name <span>*</span></label>
                        <input type="text" class="form-input" value="SHIFANA">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name <span>*</span></label>
                        <input type="text" class="form-input" value=".">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gender <span>*</span></label>
                        <select class="form-select">
                            <option>Female</option>
                            <option>Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date Of Birth <span>*</span></label>
                        <input type="date" class="form-input" value="2002-05-08">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number <span>*</span></label>
                        <input type="text" class="form-input" value="+919495302116">
                    </div>
                    <div class="form-group">
                        <label class="form-label">On Behalf <span>*</span></label>
                        <select class="form-select">
                            <option>Self</option>
                            <option>Parent</option>
                            <option>Sibling</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Marital Status <span>*</span></label>
                        <select class="form-select">
                            <option>Unmarried</option>
                            <option>Married</option>
                            <option>Divorced</option>
                            <option>Widowed</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Number Of Children <span>*</span></label>
                        <input type="number" class="form-input" value="0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Annual Salary <span>*</span></label>
                        <select class="form-select">
                            <option>Rs100,000 - Rs200,000</option>
                            <option>Rs200,000 - Rs300,000</option>
                            <option>Rs300,000 - Rs500,000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Photo (800x800)</label>
                        <div class="photo-upload">
                            <button class="browse-btn">Browse</button>
                            <button class="choose-file-btn">Choose File</button>
                        </div>
                    </div>
                </div>
                <button class="update-btn">Update</button>
                <div style="clear: both;"></div>
            </div>
            
            <!-- Present Address Section -->
            <div class="section">
                <h2 class="section-title">Present Address</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Country</label>
                        <select class="form-select">
                            <option>India</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <select class="form-select">
                            <option>Kerala</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <select class="form-select">
                            <option>Malappuram</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Postal Code</label>
                        <input type="text" class="form-input" placeholder="Postal Code">
                    </div>
                </div>
                <button class="update-btn">Update</button>
                <div style="clear: both;"></div>
            </div>
            
       <!-- Education Info Section -->
<div class="section">
    <h2 class="section-title">Education Info</h2>
    <button class="add-new-btn">+ Add New</button>
    
    <table class="education-table">
        <thead>
            <tr>
                <th>Degree</th>
                <th>Institution</th>
                <th>Start</th>
                <th>End</th>
                <th>Is Running?</th>
                <th>Is Highest Degree?</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Other Bachelor's Degree</td>
                <td>Not Mentioned</td>
                <td></td>
                <td></td>
                <td>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </td>
                <td>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </td>
                <td>
                    <div class="action-icons">
                        <button class="icon-btn edit">✏️</button>
                        <button class="icon-btn delete">🗑️</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
            <!-- Career Section -->
            <div class="section">
                <h2 class="section-title">Career</h2>
                <button class="add-new-btn">+ Add New</button>
                
                <table class="education-table">
                    <thead>
                        <tr>
                            <th>Designation</th>
                            <th>Company</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Is Current Profession</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Unemployed</td>
                            <td>Not Mentioned</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </td>
                            <td>
                                <div class="action-icons">
                                    <button class="icon-btn edit">✏️</button>
                                    <button class="icon-btn delete">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- Physical Attributes Section -->
            <div class="section">
                <h2 class="section-title">Physical Attributes</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Height (In Feet)</label>
                        <input type="text" class="form-input" placeholder="Height">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Weight (In Kg)</label>
                        <input type="text" class="form-input" placeholder="Weight">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Eye color</label>
                        <select class="form-select">
                            <option>Black</option>
                            <option>Brown</option>
                            <option>Blue</option>
                            <option>Green</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hair Color</label>
                        <select class="form-select">
                            <option>Black</option>
                            <option>Brown</option>
                            <option>Blonde</option>
                            <option>Grey</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Complexion</label>
                        <select class="form-select">
                            <option>Medium</option>
                            <option>Fair</option>
                            <option>Dark</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Blood Group</label>
                        <select class="form-select">
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Body Type</label>
                        <select class="form-select">
                            <option>Average</option>
                            <option>Slim</option>
                            <option>Athletic</option>
                            <option>Heavy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Body Art</label>
                        <select class="form-select">
                            <option>Other</option>
                            <option>None</option>
                            <option>Tattoo</option>
                            <option>Piercing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Disability</label>
                        <select class="form-select">
                            <option>None</option>
                            <option>Physical</option>
                            <option>Visual</option>
                            <option>Hearing</option>
                        </select>
                    </div>
                </div>
                <button class="update-btn">Update</button>
                <div style="clear: both;"></div>
            </div>
            
            <!-- Spiritual & Social Background Section -->
            <div class="section">
                <h2 class="section-title">Spiritual & Social Background</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Religion</label>
                        <select class="form-select">
                            <option>Islam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Caste</label>
                        <select class="form-select">
                            <option>Sunni</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Sub Caste</label>
                        <select class="form-select">
                            <option>muslim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ethnicity</label>
                        <input type="text" class="form-input" placeholder="Ethnicity">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Personal Value</label>
                        <input type="text" class="form-input" placeholder="Personal Value">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Family Value</label>
                        <select class="form-select">
                            <option>Liberal</option>
                            <option>Conservative</option>
                            <option>Moderate</option>
                        </select>
                    </div>
                    <div class="form-group full-width">
                        <label class="form-label">Community Value</label>
                        <input type="text" class="form-input" placeholder="Community Value">
                    </div>
                </div>
                <button class="update-btn">Update</button>
                <div style="clear: both;"></div>
            </div>
            
            <!-- Family Information Section -->
            <div class="section">
                <h2 class="section-title">Family Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Father</label>
                        <input type="text" class="form-input" value="ABDHUL SAMADE">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Father Occupation</label>
                        <input type="text" class="form-input" value="DRIVER (AUTO)">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mother</label>
                        <input type="text" class="form-input" value="SUHARABEE">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mother Occupation</label>
                        <input type="text" class="form-input" value="HOUSE WIFE">
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. of Brothers</label>
                        <select class="form-select">
                            <option>1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">No. of Sister</label>
                        <select class="form-select">
                            <option>2</option>
                        </select>
                    </div>
                    <div class="form-group full-width">
                        <label class="form-label">About Parents</label>
                        <textarea class="form-textarea" placeholder="About Parents"></textarea>
                    </div>
                    <div class="form-group full-width">
                        <label class="form-label">About Siblings</label>
                        <textarea class="form-textarea" placeholder="About Siblings"></textarea>
                    </div>
                </div>
                <button class="update-btn">Update</button>
                <div style="clear: both;"></div>
            </div>
            
            <!-- Partner Expectation Section -->
            <div class="section">
                <h2 class="section-title">Partner Expectation</h2>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label class="form-label">General Requirement</label>
                        <input type="text" class="form-input" placeholder="..">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Residence Country</label>
                        <select class="form-select">
                            <option>India</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Min Height (in Feet)</label>
                        <input type="text" class="form-input" value="5.9">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Max Weight (in Kg)</label>
                        <input type="text" class="form-input" value="70">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Marital Status</label>
                        <select class="form-select">
                            <option>Unmarried</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Children Acceptable</label>
                        <select class="form-select">
                            <option>No</option>
                            <option>Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Religion</label>
                        <select class="form-select">
                            <option>Islam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Caste</label>
                        <select class="form-select">
                            <option>Sunni</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Sub Caste</label>
                        <select class="form-select">
                            <option>muslim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Language</label>
                        <select class="form-select">
                            <option>Malayalam</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Education</label>
                        <input type="text" class="form-input" value="EDUCATED">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Profession</label>
                        <input type="text" class="form-input" value="GOOD JOB">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Smoking Acceptable</label>
                        <select class="form-select">
                            <option>No</option>
                            <option>Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Drinking Acceptable</label>
                        <select class="form-select">
                            <option>No</option>
                            <option>Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Dieting Acceptable</label>
                        <select class="form-select">
                            <option>No</option>
                            <option>Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Body Type</label>
                        <input type="text" class="form-input" value="DOES NOT MATTER">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Personal Value</label>
                        <input type="text" class="form-input" value="DOES NOT MATTER">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Manglik</label>
                        <select class="form-select">
                            <option>No</option>
                            <option>Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Preferred Country</label>
                        <select class="form-select">
                            <option>India</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Preferred State</label>
                        <select class="form-select">
                            <option>Kerala</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Family Value</label>
                        <select class="form-select">
                            <option>Liberal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Complexion</label>
                        <input type="text" class="form-input" placeholder="...">
                    </div>
                </div>
                <button class="update-btn">Update</button>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
</body>
</html>