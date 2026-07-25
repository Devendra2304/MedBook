<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Health Records | MedBook</title>

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
        rgba(15,23,42,.88),
        rgba(15,23,42,.88)
    ),
    url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1800&q=80');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;

    color:white;
}

/* ================= Navbar ================= */

.navbar-custom{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

    border-bottom:1px solid rgba(255,255,255,.15);

    padding:18px 0;
}

.brand{

    font-size:28px;

    font-weight:700;

    text-decoration:none;
}

/* ================= Header ================= */

.page-header{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:22px;

    padding:30px;

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

/* ================= Card ================= */

.record-card{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:22px;

    transition:.35s;

    color:white;

    overflow:hidden;
}

.record-card:hover{

    transform:translateY(-8px);

    box-shadow:0 18px 40px rgba(0,0,0,.30);
}

.card-body{

    padding:30px;
}

/* ================= Header Inside Card ================= */

.record-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:20px;
}

.doctor-left{

    display:flex;

    align-items:center;
}

.doctor-avatar{

    width:70px;

    height:70px;

    border-radius:50%;

    background:linear-gradient(135deg,#2563eb,#06b6d4);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:30px;

    color:white;

    margin-right:18px;
}

.doctor-name{

    margin:0;

    font-size:22px;

    font-weight:600;
}

.doctor-date{

    margin-top:5px;

    color:#d1d5db;

    font-size:14px;
}

.status-badge{

    font-size:14px;

    padding:9px 16px;

    border-radius:30px;
}

/* ================= Sections ================= */

.record-section{

    margin-top:22px;
}

.section-title{

    display:flex;

    align-items:center;

    gap:10px;

    font-size:17px;

    font-weight:600;

    color:#7dd3fc;

    margin-bottom:12px;
}

/* ================= Indent Block ================= */

.info-block{

    margin-left:28px;

    background:rgba(255,255,255,.08);

    border-left:5px solid #3b82f6;

    border-radius:14px;

    padding:18px;

    color:#f3f4f6;

    line-height:1.8;

    transition:.3s;
}

.info-block:hover{

    background:rgba(255,255,255,.12);

    border-left-color:#60a5fa;
}

/* ================= Divider ================= */

hr{

    border-color:rgba(255,255,255,.15);

    margin:22px 0;
}

/* ================= Button ================= */

.btn-outline-light{

    border-radius:12px;

    padding:10px 18px;
}

/* ================= Responsive ================= */

@media(max-width:992px){

.record-header{

flex-direction:column;

align-items:flex-start;

gap:18px;

}

.status-badge{

align-self:flex-start;

}

.doctor-name{

font-size:20px;

}

.info-block{

margin-left:15px;

}

}

@media(max-width:576px){

.card-body{

padding:22px;

}

.doctor-avatar{

width:60px;

height:60px;

font-size:24px;

}

.doctor-name{

font-size:18px;

}

.page-header{

padding:22px;

}

.page-header h1{

font-size:28px;

}

}

/******** CSS WILL COME IN PART 2 ********/

</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-custom">

<div class="container">

<a class="navbar-brand brand text-white" href="#">

<i class="bi bi-heart-pulse-fill me-2"></i>

MedBook

</a>

<a href="<?= base_url('patient/dashboard') ?>"
class="btn btn-outline-light">

<i class="bi bi-arrow-left"></i>

Dashboard

</a>

</div>

</nav>

<!-- Header -->

<div class="container py-5">

<div class="page-header">

<h1>

<i class="bi bi-file-earmark-medical-fill me-2"></i>

Health Records

</h1>

<p>

Access all your medical records shared by doctors.

</p>

</div>

<!-- Records -->

<div class="row gy-4 gx-4">

    <?php if(empty($records)): ?>

        <div class="alert alert-info">
            No medical records found.
        </div>

    <?php else: ?>

<?php foreach($records as $record): ?>

<div class="col-lg-6">

<div class="card shadow-lg border-0 record-card h-100">

<div class="card-body">

<!-- Header -->

<div class="record-header">

<div class="doctor-left">

<div class="doctor-avatar">

<i class="bi bi-person-badge-fill"></i>

</div>

<div>

<h4 class="doctor-name">

Dr. <?= esc($record['doctor_name']); ?>

</h4>


</div>

</div>

<span class="badge bg-success status-badge">

Approved

</span>

</div>

<hr>

<!-- Diagnosis -->

<div class="record-section">

<div class="section-title">

<i class="bi bi-heart-pulse-fill"></i>

Diagnosis

</div>

<div class="info-block">

<?= esc($record['diagnosis']); ?>

</div>

</div>

<!-- Prescription -->

<div class="record-section">

<div class="section-title">

<i class="bi bi-capsule-pill"></i>

Prescription

</div>

<div class="info-block">

<?= esc($record['prescription']); ?>

</div>

</div>

<!-- Notes -->

<div class="record-section">

<div class="section-title">

<i class="bi bi-journal-medical"></i>

Doctor's Notes

</div>

<div class="info-block">

<?= esc($record['notes']); ?>

</div>

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