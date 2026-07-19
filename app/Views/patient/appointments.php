<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Appointments | MedBook</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    font-family:'Poppins',sans-serif;
}

body{

    min-height:100vh;

    background:
    linear-gradient(
    rgba(15,23,42,.88),
    rgba(15,23,42,.88)
    ),
    url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;

    color:white;
}

.navbar-custom{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(15px);

    border-bottom:1px solid rgba(255,255,255,.15);
}

.brand{
    font-size:28px;
    font-weight:700;
}

.page-header{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:25px;

    padding:35px;

    margin-bottom:35px;
}

.appointment-card{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:25px;

    color:white;

    transition:.3s;
}

.appointment-card:hover{

    transform:translateY(-6px);

    box-shadow:
    0 20px 40px rgba(0,0,0,.25);
}

.doctor-avatar{

    width:80px;
    height:80px;

    border-radius:50%;

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #06b6d4
    );

    display:flex;
    align-items:center;
    justify-content:center;

    margin:auto;

    color:white;

    font-size:35px;
}

.specialization{

    color:#60a5fa;

    font-weight:600;
}

.status-badge{

    font-size:14px;

    padding:10px 16px;

    border-radius:30px;

    font-weight:600;
}

.status-approved{
    background:#22c55e;
    color:white;
}

.status-pending{
    background:#f59e0b;
    color:white;
}

.status-rejected{
    background:#ef4444;
    color:white;
}

.status-completed{
    background:#3b82f6;
    color:white;
}

.info-item{
    margin-bottom:10px;
}

.back-btn{
    border-radius:12px;
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

<a href="<?= base_url('patient/dashboard'); ?>"
class="btn btn-outline-light back-btn">

<i class="bi bi-arrow-left"></i>
Dashboard

</a>

</div>

</nav>

<div class="container py-5">

<div class="page-header">

<h1 class="fw-bold">

<i class="bi bi-calendar2-check-fill"></i>
My Appointments

</h1>

<p class="mb-0 text-light">

Track all your booked appointments and their status.

</p>

</div>

<div class="row g-4">

        <?php if(empty($appointments)): ?>

            <div class="alert alert-info">
                No appointments found.
            </div>

        <?php else: ?>

<?php foreach($appointments as $appointment): ?>

<div class="col-lg-4 col-md-6">

<div class="card appointment-card h-100">

<div class="card-body">

<div class="doctor-avatar mb-3">

<i class="bi bi-person-badge-fill"></i>

</div>

<h4 class="text-center">

Dr. <?= esc($appointment['doctor_name']) ?>

</h4>

<hr class="text-light">

<div class="info-item">

<i class="bi bi-calendar-event text-info"></i>

<strong> Date:</strong>

<?= esc($appointment['appointment_date']) ?>

</div>

<div class="info-item">

<i class="bi bi-clock-fill text-warning"></i>

<strong> Time:</strong>

<?= esc($appointment['appointment_time']) ?>

</div>

<div class="info-item">

<i class="bi bi-clipboard2-pulse-fill text-success"></i>

<strong> Symptoms:</strong>

<?= esc($appointment['symptoms']) ?>

</div>

<hr class="text-light">

<div class="text-center">

<?php
    $badge = 'secondary';

    if($appointment['status'] == 'Pending')
        $badge = 'warning';

    if($appointment['status'] == 'Approved')
        $badge = 'success';

    if($appointment['status'] == 'Rejected')
        $badge = 'danger';

    if($appointment['status'] == 'Completed')
        $badge = 'primary';
?>
<span class="badge bg-<?= $badge ?>">
    <?= esc($appointment['status']) ?>
</span>

</div>

</div>

</div>

</div>

<?php endforeach; ?>

<?php endif; ?>

</div>

</div>

</body>
</html>

