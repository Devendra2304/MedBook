<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedBook | Register</title>

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
            background:#0f172a;
        }

        .bg-image{
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:
            linear-gradient(
                rgba(15,23,42,.80),
                rgba(15,23,42,.80)
            ),
            url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1600&q=80');
            background-size:cover;
            background-position:center;
            z-index:-2;
        }

        .glow{
            position:absolute;
            border-radius:50%;
            filter:blur(120px);
            z-index:-1;
        }

        .glow1{
            width:300px;
            height:300px;
            background:#2563eb;
            top:-100px;
            left:-100px;
        }

        .glow2{
            width:300px;
            height:300px;
            background:#06b6d4;
            right:-100px;
            bottom:-100px;
        }

        .glow3{
            width:250px;
            height:250px;
            background:#8b5cf6;
            top:40%;
            left:45%;
        }

        .main-wrapper{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px;
        }

        .register-container{
            width:1200px;
            max-width:100%;
            min-height:720px;

            border-radius:35px;
            overflow:hidden;

            background:rgba(255,255,255,.06);
            backdrop-filter:blur(20px);

            border:1px solid rgba(255,255,255,.15);

            box-shadow:
            0 30px 60px rgba(0,0,0,.35);
        }

        /* LEFT */

        .left-side{
            color:white;
            padding:60px;
            height:100%;
        }

        .brand{
            font-size:48px;
            font-weight:800;
        }

        .tagline{
            margin-top:15px;
            color:#cbd5e1;
            font-size:18px;
            line-height:1.8;
            max-width:500px;
        }

        .hero-icon{
            font-size:220px;
            opacity:.15;
            margin-top:40px;
        }

        .feature-card{
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.12);
            border-radius:20px;
            padding:18px;
            margin-bottom:15px;
            backdrop-filter:blur(10px);
        }

        /* RIGHT */

        .right-side{
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px;
        }

        .register-card{

            width:100%;
            max-width:520px;

            background:rgba(255,255,255,.12);

            backdrop-filter:blur(25px);

            border:1px solid rgba(255,255,255,.15);

            border-radius:30px;

            padding:45px;

            box-shadow:
            0 25px 60px rgba(0,0,0,.30);
        }

        .logo-circle{
            width:90px;
            height:90px;
            border-radius:50%;
            margin:auto;

            background:linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
            );

            display:flex;
            align-items:center;
            justify-content:center;

            color:white;
            font-size:40px;
        }

        .register-title{
            color:white;
            font-weight:700;
        }

        .register-subtitle{
            color:#cbd5e1;
        }

        .form-label{
            color:white;
            font-weight:500;
        }

        .form-control,
        .form-select{
            height:58px;

            background:rgba(255,255,255,.10);

            border:1px solid rgba(255,255,255,.15);

            color:white;

            border-radius:15px;
        }

        .form-control::placeholder{
            color:rgba(255,255,255,.65);
        }

        .form-control:focus,
        .form-select:focus{
            background:rgba(255,255,255,.15);
            color:white;
            border-color:#60a5fa;
            box-shadow:none;
        }

        .form-select option{
            color:black;
        }

        .password-wrapper{
            position:relative;
        }

        .toggle-password{
            position:absolute;
            right:18px;
            top:50%;
            transform:translateY(-50%);
            cursor:pointer;
            color:white;
        }

        .btn-register{

            height:58px;

            border:none;

            border-radius:15px;

            font-weight:600;

            color:white;

            background:linear-gradient(
            135deg,
            #2563eb,
            #06b6d4
            );

            box-shadow:
            0 15px 30px rgba(37,99,235,.40);

            transition:.3s;
        }

        .btn-register:hover{
            transform:translateY(-3px);
            color:white;
        }

        .btn-login{
            height:58px;
            border-radius:15px;
            border:1px solid rgba(255,255,255,.25);
            color:white;
        }

        .btn-login:hover{
            background:white;
            color:#0f172a;
        }

        .password-strength{
            height:6px;
            border-radius:20px;
            background:rgba(255,255,255,.15);
            margin-top:10px;
            overflow:hidden;
        }

        .strength-bar{
            height:100%;
            width:0%;
            transition:.3s;
            border-radius:20px;
        }

        .strength-text{
            color:#cbd5e1;
            font-size:13px;
            margin-top:5px;
        }

        @media(max-width:991px){

            body{
                overflow:auto;
            }

            .left-side{
                display:none;
            }

            .right-side{
                padding:25px;
            }

            .register-card{
                padding:30px;
            }
        }

    </style>
</head>
<body>

<div class="bg-image"></div>

<div class="glow glow1"></div>
<div class="glow glow2"></div>
<div class="glow glow3"></div>

<div class="container-fluid main-wrapper">

    <div class="row register-container">

        <!-- LEFT SIDE -->

        <div class="col-lg-6 left-side">

            <h1 class="brand">
                <i class="bi bi-heart-pulse-fill"></i>
                MedBook
            </h1>

            <p class="tagline">
                Join thousands of patients and doctors on a secure,
                modern healthcare platform built for seamless medical care.
            </p>

            <div class="hero-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>

            <div class="row mt-4">

                <div class="col-12">
                    <div class="feature-card">
                        <h5>👨‍⚕️ Connect with Specialists</h5>
                        <small>Find and consult healthcare experts easily.</small>
                    </div>
                </div>

                <div class="col-12">
                    <div class="feature-card">
                        <h5>📅 Easy Appointment Booking</h5>
                        <small>Schedule visits in just a few clicks.</small>
                    </div>
                </div>

                <div class="col-12">
                    <div class="feature-card">
                        <h5>🔐 Privacy First</h5>
                        <small>Your personal and medical data remains protected.</small>
                    </div>
                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="col-lg-6 right-side">

            <div class="register-card">

                <div class="text-center mb-4">

                    <div class="logo-circle">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>

                    <h2 class="register-title mt-3">
                        Create Account
                    </h2>

                    <p class="register-subtitle">
                        Join MedBook and start your healthcare journey
                    </p>

                </div>

                <form method="post" action="/registerUser" >

                    <div class="mb-3">

                        <label class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter your full name"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter your email"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <div class="password-wrapper">

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Create password"
                                onkeyup="checkStrength()"
                                required>

                            <i
                                class="bi bi-eye toggle-password"
                                onclick="togglePassword()"></i>

                        </div>

                        <div class="password-strength">
                            <div class="strength-bar" id="strengthBar"></div>
                        </div>

                        <div class="strength-text" id="strengthText">
                            Password Strength
                        </div>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Register As
                        </label>

                        <select
                            name="role"
                            class="form-select"
                            required>

                            <option value="">
                                Select Role
                            </option>

                            <option value="patient">
                                Patient
                            </option>

                            <option value="doctor">
                                Doctor
                            </option>

                        </select>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-register w-100 mb-3">

                        <i class="bi bi-person-check-fill me-2"></i>
                        Create Account

                    </button>

                    <a
                        href="/login"
                        class="btn btn-login w-100">

                        Already Registered? Login

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword(){

    let password =
    document.getElementById('password');

    password.type =
    password.type === 'password'
    ? 'text'
    : 'password';
}

function checkStrength(){

    let password =
    document.getElementById('password').value;

    let bar =
    document.getElementById('strengthBar');

    let text =
    document.getElementById('strengthText');

    if(password.length < 4){

        bar.style.width = "25%";
        bar.style.background = "#ef4444";
        text.innerHTML = "Weak Password";

    }
    else if(password.length < 8){

        bar.style.width = "60%";
        bar.style.background = "#f59e0b";
        text.innerHTML = "Medium Password";

    }
    else{

        bar.style.width = "100%";
        bar.style.background = "#22c55e";
        text.innerHTML = "Strong Password";
    }
}

</script>

</body>
</html>