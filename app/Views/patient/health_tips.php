<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Health Tips | MedBook</title>

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

/* Header */

.page-header{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:25px;

    padding:35px;

    margin-bottom:35px;
}

/* Bootstrap Card */

.tip-card{

    background:rgba(255,255,255,.08);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.15);

    border-radius:25px;

    overflow:hidden;

    color:white;

    transition:.3s;
}

.tip-card:hover{

    transform:translateY(-8px);

    box-shadow:0 20px 40px rgba(0,0,0,.25);
}

.card-body{
    padding:25px;
}

.card-title{

    font-weight:700;

    margin-top:15px;
}

/* Video */

video{

    width:100%;

    height:220px;

    object-fit:cover;

    border-radius:15px;

    background:black;
}

/* Audio */

audio{

    width:100%;

    margin-top:15px;
}

/* Description */

.description{

    color:#d1d5db;

    margin-top:12px;
}

/* Button */

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

<i class="bi bi-camera-video-fill"></i>

Health Tips Videos

</h1>

<p class="mb-0">

Watch informative health videos and listen to expert audio guidance.

</p>

</div>

<div class="row g-4">

<?php foreach($tips as $tip): ?>

<div class="col-lg-6">

<div class="card tip-card h-100">

<div class="card-body">

<!-- Video -->

<video controls>

<source
src="<?= base_url('uploads/videos/' . $tip['file_name']); ?>"
type="video/mp4">

Your browser does not support video.

</video>

<!-- Audio -->

<audio controls>

<source
src="<?= base_url('uploads/audio/' . $tip['file_name']); ?>"
type="audio/mpeg">

Your browser does not support audio.

</audio>

<!-- Title -->

<h4 class="card-title">

<?= esc($tip['title']); ?>

</h4>

<!-- Description -->

<p class="description">

<?= esc($tip['description']); ?>

</p>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>