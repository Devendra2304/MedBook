<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Appointments | MedBook</title>
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
    color:#fff;
}

/* ================= NAVBAR ================= */

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

/* ================= HEADER ================= */

.page-header{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:22px;
    padding:32px;
    margin-bottom:35px;
}

.page-header h1{
    font-weight:700;
    margin-bottom:8px;
}

.page-header p{
    color:#d1d5db;
    margin:0;
}

/* ================= ALERT ================= */

.alert{
    border:none;
    border-radius:18px;
}

/* ================= CARD ================= */

.appointment-card{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:22px;
    transition:.35s;
    color:white;
    overflow:hidden;
}

.appointment-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 40px rgba(0,0,0,.30);
}

.card-body{
    padding:28px;
}

/* ================= HEADER ================= */

.patient-name{
    font-size:22px;
    font-weight:600;
    margin:0;
}

.status-badge{
    font-size:14px;
    padding:8px 18px;
    border-radius:25px;
}

/* ================= DETAILS ================= */

.detail-box{
    background:rgba(255,255,255,.05);
    border-radius:18px;
    padding:18px;
    border-left:4px solid #3b82f6;
}

.detail-row{
    display:flex;
    align-items:center;
    margin-bottom:18px;
}

.detail-row:last-child{
    margin-bottom:0;
}

.detail-row i{
    font-size:20px;
    color:#60a5fa;
    width:35px;
}

.detail-row strong{
    width:110px;
    color:#7dd3fc;
}

.detail-row span{
    color:#f8fafc;
    flex:1;
    word-break:break-word;
}

/* ================= BUTTONS ================= */

.btn{
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.btn-success{
    background:#16a34a;
    border:none;
}

.btn-success:hover{
    background:#15803d;
    transform:translateY(-2px);
}

.btn-danger{
    background:#dc2626;
    border:none;
}

.btn-danger:hover{
    background:#b91c1c;
    transform:translateY(-2px);
}

.btn-primary{
    background:#2563eb;
    border:none;
}

.btn-primary:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

.btn-secondary{
    border:none;
}

/* ================= DIVIDER ================= */

hr{
    border-color:rgba(255,255,255,.12);
    margin:22px 0;
}

/* ================= RESPONSIVE ================= */

@media(max-width:992px){
.page-header{
padding:25px;
}

.patient-name{
font-size:20px;
}
}

@media(max-width:768px){
.card-body{
padding:22px;
}

.detail-row{
flex-wrap:wrap;
}

.detail-row strong{
width:100%;
margin:5px 0 5px 35px;
}

.detail-row span{
margin-left:35px;
}

.page-header h1{
font-size:30px;
}
}

@media(max-width:576px){
.page-header{
padding:20px;
}

.page-header h1{
font-size:26px;
}

.patient-name{
font-size:18px;
}

.status-badge{
font-size:12px;
}
}
/************ CSS WILL COME IN PART 2 ************/
</style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
<div class="container">
<a class="navbar-brand brand text-white">
<i class="bi bi-heart-pulse-fill me-2"></i>
MedBook
</a>

<a href="<?= base_url('doctor/dashboard') ?>" class="btn btn-outline-light">
<i class="bi bi-arrow-left"></i>
Dashboard
</a>
</div>
</nav>
<div class="container py-5">
<!-- Heading -->
<div class="page-header">
<h1>
<i class="bi bi-calendar2-check-fill me-2"></i>
Manage Appointments
</h1>
<p>
Review, approve or reject appointment requests from patients.
</p>
</div>
<!-- Flash Messages -->
<?php if(session()->getFlashdata('success')): ?>
<div class="alert alert-success rounded-4 shadow-sm">
<?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
<div class="alert alert-danger rounded-4 shadow-sm">
<?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>
<div class="row gy-4">
<?php if(empty($appointments)): ?>
<div class="col-12">
<div class="alert alert-info text-center rounded-4">
<i class="bi bi-info-circle-fill me-2"></i>
No appointments found.
</div>
</div>
<?php else: ?>
<?php foreach($appointments as $appointment): ?>
<div class="col-lg-6">
<div class="card appointment-card h-100">
<div class="card-body">
<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4">
<div>
<h4 class="patient-name">
<i class="bi bi-person-circle me-2"></i>
<?= esc($appointment['patient_name']) ?>
</h4>
<small class="text-light">
Appointment Request
</small>
</div>
<?php
$status = strtolower($appointment['status']);
$badge = "bg-warning";
if($status=="approved"){
$badge="bg-success";
}
elseif($status=="rejected"){
$badge="bg-danger";
}
?>
<span class="badge <?= $badge ?> status-badge">
<?= esc($appointment['status']) ?>
</span>
</div>
<hr>
<!-- Details -->
<div class="detail-box">
<div class="detail-row">
<i class="bi bi-calendar-event-fill"></i>
<strong>Date</strong>
<span><?= esc($appointment['appointment_date']) ?></span>
</div>
<div class="detail-row">
<i class="bi bi-clock-fill"></i>
<strong>Time</strong>
<span><?= esc($appointment['appointment_time']) ?></span>
</div>

<div class="detail-row align-items-start">
<i class="bi bi-heart-pulse-fill"></i>
<strong>Symptoms</strong>
<span><?= esc($appointment['symptoms']) ?></span>
</div>
</div>
<hr>
<!-- Buttons -->
<div class="d-grid gap-2">
<?php if($appointment['status']=="Pending"): ?>
<div class="row">
<div class="col-6">
<a href="/doctor/approve/<?= $appointment['id'] ?>"
class="btn btn-success w-100">
<i class="bi bi-check-circle-fill me-2"></i>
Approve
</a>
</div>
<div class="col-6">
<a href="/doctor/reject/<?= $appointment['id'] ?>"
class="btn btn-danger w-100">
<i class="bi bi-x-circle-fill me-2"></i>
Reject
</a>
</div>
</div>

<?php endif; ?>
<?php if($appointment['status']=="Approved"): ?>
<a href="/doctor/record/<?= $appointment['id'] ?>"
class="btn btn-primary">
<i class="bi bi-file-earmark-medical-fill me-2"></i>
Add Health Record
</a>
<?php endif; ?>
<?php if($appointment['status']=="Rejected"): ?>
<button class="btn btn-secondary" disabled>
<i class="bi bi-x-octagon-fill me-2"></i>
Appointment Rejected
</button>
<?php endif; ?>
</div>
</div>
</div>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>