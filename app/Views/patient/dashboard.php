<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patient Dashboard | MedBook</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
    linear-gradient(
    rgba(15,23,42,.85),
    rgba(15,23,42,.85)
    ),
    url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;
    color:white;
}

.navbar-custom{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(15px);
    border-bottom:1px solid rgba(255,255,255,.1);
}

.brand{
    font-size:28px;
    font-weight:700;
}

.dashboard-container{
    padding:40px;
}

.welcome-card{
    background:rgba(255,255,255,.10);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:25px;
    padding:35px;
    margin-bottom:30px;
}

.profile-card{
    background:rgba(255,255,255,.10);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:25px;
    padding:30px;
    height:100%;
}

.action-card{
    background:rgba(255,255,255,.10);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:25px;
    padding:30px;
    text-align:center;
    transition:.3s;
    height:100%;
}

.action-card:hover{
    transform:translateY(-8px);
}

.action-icon{
    font-size:60px;
    margin-bottom:15px;
    color:#60a5fa;
}

.btn-dashboard{
    background:linear-gradient(
    135deg,
    #2563eb,
    #06b6d4
    );
    border:none;
    border-radius:12px;
    color:white;
    padding:12px 25px;
    font-weight:600;
}

.btn-dashboard:hover{
    color:white;
}

.logout-btn{
    border-radius:12px;
}

.health-card{
    background:rgba(255,255,255,.10);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:25px;
    padding:25px;
}

.profile-icon{
    width:90px;
    height:90px;
    border-radius:50%;
    background:linear-gradient(
    135deg,
    #2563eb,
    #06b6d4
    );

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:40px;
    margin:auto;
    margin-bottom:15px;
}

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
<div class="container">

<span class="navbar-brand text-white brand">
<i class="bi bi-heart-pulse-fill"></i>
 MedBook
</span>

<a href="/logout"
class="btn btn-outline-light logout-btn">

<i class="bi bi-box-arrow-right"></i>
 Logout

</a>

</div>
</nav>

<div class="container dashboard-container">

<div class="welcome-card">

<h1 class="fw-bold">
Welcome Back 👋
</h1>

<p class="mb-0 text-light">
Manage appointments, connect with doctors and track your healthcare journey.
</p>

</div>

<div class="row g-4 mb-4">

<div class="col-lg-4">

<div class="profile-card">

<div class="profile-icon">
<i class="bi bi-person-fill"></i>
</div>

<h4 class="text-center">

<?= session()->get('name') ?>

</h4>

<p class="text-center text-light">
Patient
</p>

<hr>

<p>
<strong>Email:</strong><br>
<?= session()->get('email') ?>
</p>

</div>

</div>

<div class="col-lg-4">

<div class="action-card">

<div class="action-icon">
<i class="bi bi-hospital"></i>
</div>

<h4>View Doctors</h4>

<p>
Browse available doctors and book appointments.
</p>

<a href="/patient/doctors"
class="btn btn-dashboard">

View Doctors

</a>

</div>

</div>

<div class="col-lg-4">

<div class="action-card">

<div class="action-icon">
<i class="bi bi-calendar-check"></i>
</div>

<h4>My Appointments</h4>

<p>
Check your booked appointments and status.
</p>

<a href="/patient/appointments"
class="btn btn-dashboard">

View Appointments

</a>

</div>

</div>

</div>

<div class="health-card">

<h4 class="mb-3">
<i class="bi bi-heart-pulse-fill"></i>
 Health Reminder
</h4>

<p class="mb-0">
Stay hydrated, maintain a healthy diet, exercise regularly,
and schedule routine health checkups.
</p>

</div>

</div>

</body>
</html>