<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Available Doctors | MedBook</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Google Font -->
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
    rgba(15,23,42,.88),
    rgba(15,23,42,.88)
    ),
    url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;

    color:white;
}

/* Navbar */

.navbar-custom{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(15px);

    border-bottom:1px solid rgba(255,255,255,.15);
}

.brand{
    font-size:28px;
    font-weight:700;
}

/* Page Header */

.page-header{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:25px;

    padding:35px;

    margin-bottom:35px;

    box-shadow:
    0 15px 35px rgba(0,0,0,.20);
}

/* Search */

.search-box{

    background:rgba(255,255,255,.10);

    border:1px solid rgba(255,255,255,.15);

    color:white;

    height:55px;

    border-radius:15px;
}

.search-box::placeholder{
    color:#cbd5e1;
}

.search-box:focus{

    background:rgba(255,255,255,.15);

    color:white;

    border-color:#60a5fa;

    box-shadow:none;
}

/* Bootstrap Card Styling */

.doctor-card{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:25px;

    color:white;

    transition:.3s;

    overflow:hidden;
}

.doctor-card:hover{

    transform:translateY(-8px);

    box-shadow:
    0 20px 40px rgba(0,0,0,.30);
}

.card-body{
    padding:30px;
}

/* Doctor Avatar */

.doctor-avatar{

    width:90px;
    height:90px;

    margin:auto;

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

    font-size:40px;

    color:white;
}

/* Doctor Info */

.specialization{

    color:#60a5fa;

    font-weight:600;

    font-size:15px;
}

.info-item{

    margin-bottom:12px;

    font-size:15px;
}

/* Buttons */

.btn-book{

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #06b6d4
    );

    border:none;

    color:white;

    font-weight:600;

    border-radius:12px;

    padding:12px;
}

.btn-book:hover{

    color:white;

    opacity:.95;
}

.back-btn{

    border-radius:12px;
}

/* Responsive */

@media(max-width:768px){

    .page-header{
        padding:25px;
    }

    .brand{
        font-size:22px;
    }
}

</style>
</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-custom">

<div class="container">

<span class="navbar-brand text-white brand">

<i class="bi bi-heart-pulse-fill"></i>
MedBook

</span>

<a href="<?= base_url('patient/dashboard') ?>"
class="btn btn-outline-light back-btn">

<i class="bi bi-arrow-left"></i>
Dashboard

</a>

</div>

</nav>

<!-- Content -->

<div class="container py-5">

<!-- Header -->

<div class="page-header">

<h1 class="fw-bold mb-2">

<i class="bi bi-hospital"></i>
Available Doctors

</h1>

<p class="text-light mb-3">

Browse our verified healthcare professionals and book appointments instantly.

</p>

<input
type="text"
class="form-control search-box"
placeholder="Search doctors by name or specialization">

</div>

<!-- Doctor Cards -->

<div class="row g-4">

<?php foreach($doctors as $doctor): ?>

<div class="col-lg-4 col-md-6">

<div class="card doctor-card h-100">

<div class="card-body">

<div class="doctor-avatar mb-3">

<i class="bi bi-person-badge-fill"></i>

</div>

<h4 class="text-center">

Dr. <?= esc($doctor['name']) ?>

</h4>

<p class="text-center specialization">

<?= esc($doctor['specialization']) ?>

</p>

<hr class="text-light">

<div class="info-item">

<i class="bi bi-award-fill text-info"></i>

<strong> Experience:</strong>

<?= esc($doctor['experience']) ?> Years

</div>

<div class="info-item">

<i class="bi bi-telephone-fill text-success"></i>

<strong> Phone:</strong>

<?= esc($doctor['phone']) ?>

</div>



<div class="mt-4">

<a
href="/patient/book/<?= $doctor['id'] ?>"
class="btn btn-book w-100">

<i class="bi bi-calendar-check-fill me-2"></i>

Book Appointment

</a>

</div>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

