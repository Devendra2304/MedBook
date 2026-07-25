<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Medical Record | MedBook</title>
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
    padding:30px;
    margin-bottom:30px;
}

.page-header h1{
    font-weight:700;
    margin-bottom:8px;
}

.page-header p{
    color:#d1d5db;
    margin:0;
}

/* ================= CARDS ================= */

.info-card{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,.15);
    border-radius:22px;
    overflow:hidden;
    transition:.35s;
}

.info-card:hover{
    transform:translateY(-5px);
    box-shadow:0 18px 40px rgba(0,0,0,.25);
}

.card-body{
    padding:30px;
}

/* ================= SECTION TITLE ================= */

.section-heading{
    font-weight:600;
    margin-bottom:0;
    color:#fff;
}

.section-heading i{
    color:#60a5fa;
}

/* ================= INFO BOX ================= */

.info-label{
    color:#7dd3fc;
    font-weight:600;
    margin-bottom:8px;
    display:block;
}

.info-box{
    background:rgba(255,255,255,.08);
    border-left:4px solid #3b82f6;
    border-radius:12px;
    padding:14px 18px;
    color:#f8fafc;
    min-height:52px;
    display:flex;
    align-items:center;
}

/* ================= FORM ================= */

.form-label{
    color:#7dd3fc;
    font-weight:600;
    margin-bottom:10px;
}

.form-control{
    background:rgba(255,255,255,.08);
    border:1px solid rgba(255,255,255,.15);
    color:#fff;
    border-radius:15px;
    padding:14px 18px;
    resize:none;
}

.form-control:focus{
    background:rgba(255,255,255,.12);
    border-color:#3b82f6;
    color:#fff;
    box-shadow:0 0 15px rgba(59,130,246,.35);
}

.form-control::placeholder{
    color:#cbd5e1;
}

/* ================= BUTTON ================= */

.btn-save{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:white;
    padding:14px 35px;
    border:none;
    border-radius:14px;
    font-weight:600;
    font-size:17px;
    transition:.3s;
}

.btn-save:hover{
    background:linear-gradient(135deg,#1d4ed8,#1e40af);
    transform:translateY(-3px);
    color:white;
    box-shadow:0 12px 25px rgba(37,99,235,.35);
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

.card-body{
padding:25px;
}
}

@media(max-width:768px){
.page-header h1{
font-size:30px;
}

.info-box{
min-height:auto;
}

.btn-save{
width:100%;
}
}

@media(max-width:576px){
.page-header{
padding:20px;
}

.page-header h1{
font-size:26px;
}

.card-body{
padding:20px;
}

.brand{
font-size:24px;
}
}

/************* CSS COMES IN PART 2 *************/

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
<a href="<?= base_url('doctor/appointments') ?>" class="btn btn-outline-light">
<i class="bi bi-arrow-left"></i>
Manage Appointments
</a>
</div>
</nav>
<div class="container py-5">

<!-- Page Header -->

<div class="page-header">
<h1>
<i class="bi bi-file-earmark-medical-fill me-2"></i>
Add Medical Record
</h1>
<p>
Complete the patient's medical record after consultation.
</p>
</div>
<form action="/doctor/save-record" method="post">
<input type="hidden"
name="appointment_id"
value="<?= $appointment['id'] ?>">
<input type="hidden"
  name="patient_id"
  value="<?= $appointment['patient_id'] ?>">
<input type="hidden"
  name="doctor_id"
  value="<?= session()->get('doctor_id') ?>">

<!-- Patient Information -->

<div class="card info-card mb-4">
<div class="card-body">
<h4 class="section-heading">
<i class="bi bi-person-vcard-fill me-2"></i>
Patient Information
</h4>
<hr>
<div class="row">
<div class="col-md-4 mb-3">
<label class="info-label">
Patient Name
</label>

<div class="info-box">
<?= esc($appointment['patient_name']) ?>
</div>
</div>

<div class="col-md-4 mb-3">
<label class="info-label">
Appointment Date
</label>

<div class="info-box">
<?= esc($appointment['appointment_date']) ?>
</div>
</div>

<div class="col-md-4 mb-3">
<label class="info-label">
Symptoms
</label>

<div class="info-box">
<?= esc($appointment['symptoms']) ?>
</div>
</div>
</div>
</div>
</div>

<!-- Medical Record -->

<div class="card info-card">
<div class="card-body">
<h4 class="section-heading">
<i class="bi bi-heart-pulse-fill me-2"></i>
Medical Record
</h4>
<hr>
<div class="mb-4">
<label class="form-label">

Diagnosis

</label>
<textarea
class="form-control"
name="diagnosis"
rows="4"
placeholder="Enter diagnosis..."
required></textarea>
</div>

<div class="mb-4">
<label class="form-label">
Prescription
</label>
<textarea
class="form-control"
name="prescription"
rows="4"
placeholder="Enter prescription..."
required></textarea>
</div>

<div class="mb-4">
<label class="form-label">
Doctor's Notes
</label>

<textarea
class="form-control"
name="notes"
rows="5"
placeholder="Additional notes..."></textarea>
</div>

<div class="text-center">
<button
type="submit"
class="btn btn-save">
<i class="bi bi-floppy-fill me-2"></i>
Save Medical Record
</button>
</div>
</div>
</div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>