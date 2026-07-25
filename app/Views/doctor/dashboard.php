<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Dashboard | MedBook</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
min-height:100vh;
background:
linear-gradient(rgba(15,23,42,.88),rgba(15,23,42,.88)),
url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1800&q=80');
background-size:cover;
background-position:center;
background-attachment:fixed;

color:white;
}

/* Navbar */

.navbar-custom{
background:rgba(255,255,255,.08);
backdrop-filter:blur(18px);
border-bottom:1px solid rgba(255,255,255,.15);
padding:15px 0;
}

.brand{
font-size:28px;
font-weight:700;
}

/* Welcome Card */

.profile-card{
background:rgba(255,255,255,.08);
backdrop-filter:blur(20px);
border:1px solid rgba(255,255,255,.15);
border-radius:25px;
padding:35px;
text-align:center;
height:100%;
}

.profile-icon{
width:100px;
height:100px;
border-radius:50%;
background:linear-gradient(135deg,#2563eb,#06b6d4);
display:flex;
align-items:center;
justify-content:center;
font-size:45px;
margin:auto;
margin-bottom:20px;
}

.profile-card h2{
font-weight:700;
margin-bottom:8px;
}

.profile-card p{
color:#d1d5db;
margin-bottom:0;
}

/* Action Cards */

.action-card{
background:rgba(255,255,255,.08);
backdrop-filter:blur(20px);
border:1px solid rgba(255,255,255,.15);
border-radius:25px;
padding:30px;
text-align:center;
height:100%;
transition:.3s;
}

.action-card:hover{
transform:translateY(-8px);
box-shadow:0 18px 35px rgba(0,0,0,.25);
}

.action-icon{
width:75px;
height:75px;
border-radius:50%;
background:linear-gradient(135deg,#2563eb,#06b6d4);
display:flex;
align-items:center;
justify-content:center;
font-size:30px;
margin:auto;
margin-bottom:20px;
}

.action-card h4{
font-weight:600;
margin-bottom:10px;
}

.action-card p{
color:#d1d5db;
min-height:55px;
}

/* Buttons */

.btn-dashboard{
background:#2563eb;
color:white;
border:none;
border-radius:12px;
padding:10px 22px;
font-weight:600;
transition:.3s;
}

.btn-dashboard:hover{
background:#1d4ed8;
color:white;
}

.logout-btn{
background:#dc3545;
}

.logout-btn:hover{
background:#bb2d3b;
}

/* ================= Dashboard Overview ================= */

.overview-card{
background:rgba(255,255,255,.08);
backdrop-filter:blur(20px);
border:1px solid rgba(255,255,255,.15);
border-radius:25px;
padding:35px;
margin-bottom:30px;
}

.overview-icon{
width:70px;
height:70px;
border-radius:50%;
background:linear-gradient(135deg,#2563eb,#06b6d4);
display:flex;
align-items:center;
justify-content:center;
font-size:30px;
color:white;
}

.stat-box{
background:rgba(255,255,255,.08);
border:1px solid rgba(255,255,255,.12);
border-radius:20px;
padding:25px;
text-align:center;
transition:.3s;
height:100%;
}

.stat-box:hover{
transform:translateY(-6px);
background:rgba(255,255,255,.12);
box-shadow:0 15px 30px rgba(0,0,0,.20);
}

.stat-icon{
font-size:34px;
color:#60a5fa;
margin-bottom:15px;
display:block;
}

.stat-box h2{
font-weight:700;
font-size:32px;
margin-bottom:8px;
}

.stat-box p{
margin:0;
color:#d1d5db;
font-size:15px;
}
</style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
<div class="container">
<span class="navbar-brand text-white brand">
<i class="bi bi-heart-pulse-fill me-2"></i>
MedBook
</span>
</div>
</nav>
<div class="container py-5">
<div class="row g-4">
<!-- Doctor Profile -->
<div class="col-lg-4">
<div class="profile-card">
<div class="profile-icon">
<i class="bi bi-person-badge-fill"></i>
</div>
<h2>
Welcome,
</h2>
<h4>
Dr. <?= session()->get('name') ?>
</h4>
<p>
Manage appointments, update patient records, and provide quality healthcare services.
</p>
</div>
</div>
<!-- Manage Appointments -->
<div class="col-lg-4">
<div class="action-card">
<div class="action-icon">
<i class="bi bi-calendar2-check-fill"></i>
</div>
<h4>
Manage Appointments
</h4>
<p>
View appointment requests, approve or reject appointments, and manage patient schedules.
</p>
<a href="/doctor/appointments"
class="btn btn-dashboard">
Manage Appointments
</a>
</div>
</div>
<!-- Logout -->
<div class="col-lg-4">
<div class="action-card">
<div class="action-icon">
<i class="bi bi-box-arrow-right"></i>
</div>
<h4>
Logout
</h4>
<p>
Securely sign out from your doctor account.
</p>
<a href="/logout"
class="btn btn-dashboard logout-btn">
Logout
</a>
</div>
</div>
</div>
</div>
<!-- Dashboard Overview -->
<div class="container py-4"> 
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="overview-card">
            <div class="d-flex align-items-center mb-4">
                <div class="overview-icon">
                    <i class="bi bi-bar-chart-fill"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-1">Dashboard Overview</h3>
                    <p class="mb-0 text-light">
                        Quick summary of your healthcare activities.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-box">
                        <i class="bi bi-people-fill stat-icon"></i>
                        <h2><?= $totalPatients ?></h2>
                        <p>Registered Patients</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <i class="bi bi-calendar2-check-fill stat-icon"></i>
                        <h2><?= $totalAppointments ?></h2>
                        <p>Today's Appointments</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <i class="bi bi-check-circle-fill stat-icon"></i>
                        <h2><?= $approvedAppointments ?></h2>
                        <p>Approved</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <i class="bi bi-hourglass-split stat-icon"></i>
                        <h2><?= $pendingAppointments ?></h2>
                        <p>Pending</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>