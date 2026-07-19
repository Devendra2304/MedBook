<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedBook | Login</title>

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

        /* =========================
           Background
        ==========================*/

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

        /* =========================
           Main Layout
        ==========================*/

        .main-wrapper{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px;
        }

        .login-container{
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

        /* =========================
           Left Side
        ==========================*/

        .left-side{
            color:white;
            padding:60px;
            height:100%;
            position:relative;
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
            margin-top:50px;
        }

        .feature-card{
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.12);
            border-radius:20px;
            padding:18px;
            margin-bottom:15px;
            backdrop-filter:blur(10px);
        }

        .feature-card h5{
            margin-bottom:5px;
        }

        /* =========================
           Right Side
        ==========================*/

        .right-side{
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px;
        }

        .login-card{
            width:100%;
            max-width:500px;

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

        .login-title{
            color:white;
            font-weight:700;
        }

        .login-subtitle{
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

        .btn-login{

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

        .btn-login:hover{
            transform:translateY(-3px);
            color:white;
        }

        .btn-register{
            height:58px;
            border-radius:15px;
            border:1px solid rgba(255,255,255,.25);
            color:white;
        }

        .btn-register:hover{
            background:white;
            color:#0f172a;
        }

        .forgot-link{
            color:#93c5fd;
            text-decoration:none;
        }

        .forgot-link:hover{
            color:white;
        }

        .form-check-label{
            color:#cbd5e1;
        }

        /* =========================
           Responsive
        ==========================*/

        @media(max-width:991px){

            body{
                overflow:auto;
            }

            .left-side{
                display:none;
            }

            .login-container{
                min-height:auto;
            }

            .right-side{
                padding:25px;
            }

            .login-card{
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

    <div class="row login-container">

        <!-- LEFT SIDE -->

        <div class="col-lg-6 left-side">

            <h1 class="brand">
                <i class="bi bi-heart-pulse-fill"></i>
                MedBook
            </h1>

            <p class="tagline">
                Connect with trusted doctors, manage appointments,
                access medical records and experience modern healthcare
                from anywhere.
            </p>

            <div class="hero-icon">
                <i class="bi bi-hospital"></i>
            </div>

            <div class="row mt-4">

                <div class="col-12">
                    <div class="feature-card">
                        <h5>👨‍⚕️ Verified Doctors</h5>
                        <small>Consult trusted healthcare professionals.</small>
                    </div>
                </div>

                <div class="col-12">
                    <div class="feature-card">
                        <h5>🔒 Secure Records</h5>
                        <small>Your medical data stays protected.</small>
                    </div>
                </div>

                <div class="col-12">
                    <div class="feature-card">
                        <h5>❤️ 24/7 Healthcare Access</h5>
                        <small>Healthcare support whenever you need it.</small>
                    </div>
                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="col-lg-6 right-side">

            <div class="login-card">

                <div class="text-center mb-4">

                    <div class="logo-circle">
                        <i class="bi bi-heart-pulse-fill"></i>
                    </div>

                    <h2 class="login-title mt-3">
                        Welcome Back
                    </h2>

                    <p class="login-subtitle">
                        Login to continue your healthcare journey
                    </p>

                </div>

                <form action="/loginUser" method="post">

                    <div class="mb-3">
                        <label class="form-label">
                            Login As
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
                                placeholder="Enter your password"
                                required>

                            <i
                                class="bi bi-eye toggle-password"
                                onclick="togglePassword()"></i>

                        </div>

                    </div>

                    <div class="d-flex justify-content-between mb-4">

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox">

                            <label class="form-check-label">
                                Remember Me
                            </label>

                        </div>

                        <a href="#" class="forgot-link">
                            Forgot Password?
                        </a>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-login w-100 mb-3">

                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Login

                    </button>

                    <a
                        href="<?= base_url('register') ?>"
                        class="btn btn-register w-100">

                        Create New Account

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

</script>

</body>
</html>