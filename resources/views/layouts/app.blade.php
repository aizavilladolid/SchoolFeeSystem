<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Fee System | Barangay Resource Management</title>
    <style>
        :root {
    --usjr-green: #004d26;  /* The deep green header */
    --usjr-yellow: #ffb81c; /* The golden accent/announcement color */
    --usjr-bg: #f4f4f4;     /* Light grey background */
    --white: #ffffff;
}

body { 
    font-family: 'Segoe UI', Tahoma, sans-serif; 
    margin: 0; 
    display: flex; 
    background-color: var(--usjr-bg); 
}

/* Sidebar - matching the yellow/green theme */
.sidebar { 
    width: 260px; 
    height: 100vh; 
    background: #ffcc00; 
    position: fixed; 
    top: 0;
    left: 0;
    z-index: 1000;
    display: flex;
    flex-direction: column; /* This stacks links vertically */
}

.nav-link { 
    display: block; /* Ensures each link takes up its own line */
    padding: 15px 20px; 
    color: #000; 
    text-decoration: none; 
    font-weight: 500;
    border-bottom: 1px solid rgba(0,0,0,0.05); /* Subtle separator */
}

.nav-link:hover {
    background-color: #e6b800;
}

/* Ensure the main content wrapper doesn't have its own margin */
.main-content {
    margin-left: 260px; /* This is the ONLY place we need the margin */
    width: calc(100% - 260px); /* This ensures it only takes the remaining space */
}

.top-header {
    background: #004d26;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    width: 100%; /* Now 100% of the main-content, not the whole screen */
}

.container { 
    padding: 30px; /* Remove margin-left here! The main-content parent handles it */
    background-color: #f4f4f4;
}

    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">FeeSystem Pro</div>
        <a href="#" class="nav-link">🏠 Dashboard</a>
        <a href="{{ route('reports.index') }}" class="nav-link active">📋 Collection Reports</a>
        <a href="{{ route('payments.create') }}" class="nav-link">➕ New Payment</a>
        <a href="#" class="nav-link">👥 Students</a>
    </div>

    <div class="main-content" style="margin-left: 260px; width: 100%;">
    <div class="top-header">
        <h1 style="margin: 0; font-size: 24px;">School Information Service</h1>
    </div>

    <div class="container" style="padding: 20px;">
        <div style="background: var(--usjr-yellow); padding: 20px; border-radius: 4px; margin-bottom: 30px; border: 1px solid #d4a017;">
            <h3 style="margin-top: 0; text-align: center; text-transform: uppercase;">Announcement</h3>
            <p style="font-size: 14px;">Welcome to the <strong>School Fee System</strong>. Please ensure all payment records are double-checked before exporting reports.</p>
        </div>

        @yield('content')
    </div>
</div>

</body>
</html>