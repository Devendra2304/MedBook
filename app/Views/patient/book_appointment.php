<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Book Appointment | MedBook</title>

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

.main-card{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:30px;

    padding:40px;
}

.doctor-info{

    background:rgba(255,255,255,.08);

    border:1px solid rgba(255,255,255,.12);

    border-radius:20px;

    padding:25px;

    margin-bottom:30px;
}

.doctor-avatar{

    width:90px;
    height:90px;

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

    color:white;

    font-size:40px;

    margin:auto;
}

.specialization{

    color:#60a5fa;

    font-weight:600;
}

.form-label{

    color:white;

    font-weight:500;
}

.form-control{

    background:rgba(255,255,255,.10);

    border:1px solid rgba(255,255,255,.15);

    color:white;

    border-radius:15px;
}

.form-control:focus{

    background:rgba(255,255,255,.15);

    color:white;

    border-color:#60a5fa;

    box-shadow:none;
}

textarea.form-control{
    min-height:140px;
}

.btn-book{

    background:
    linear-gradient(
    135deg,
    #2563eb,
    #06b6d4
    );

    border:none;

    color:white;

    height:55px;

    border-radius:15px;

    font-weight:600;
}

.btn-book:hover{
    color:white;
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

<a href="<?= base_url('patient/doctors'); ?>"
class="btn btn-outline-light">

<i class="bi bi-arrow-left"></i>
Back

</a>

</div>

</nav>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="main-card">

<h2 class="fw-bold text-center mb-4">

<i class="bi bi-calendar-check-fill"></i>
Book Appointment

</h2>

<!-- Doctor Information -->

<div class="doctor-info text-center">

<div class="doctor-avatar mb-3">

<i class="bi bi-person-badge-fill"></i>

</div>

<h3>

Dr. <?= esc($doctor['name']) ?>

</h3>

<p class="specialization mb-2">

<?= esc($doctor['specialization']) ?>

</p>

<p class="mb-0">

<i class="bi bi-award-fill text-info"></i>

<?= esc($doctor['experience']) ?> Years Experience

</p>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

</div>

<form
action="/patient/save-appointment"
method="post">

<input
type="hidden"
name="doctor_id"
value="<?= $doctor['id'] ?>">

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">

Appointment Date

</label>

<input
type="date"
name="appointment_date"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">

Appointment Time

</label>

<input
type="time"
name="appointment_time"
class="form-control"
required>

</div>

</div>

<div class="mb-4">

<label class="form-label">

Symptoms

</label>

<textarea
name="symptoms"
class="form-control"
placeholder="Describe your symptoms..."
required></textarea>

</div>

<button
class="btn btn-book w-100">

<i class="bi bi-calendar-check-fill me-2"></i>

Confirm Appointment

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>