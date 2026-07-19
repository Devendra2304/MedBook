<!DOCTYPE html>
<html>
<head>
    <title>Doctors</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Available Doctors</h2>

    <div class="row">

        <?php foreach($doctors as $doctor): ?>

            <div class="col-md-4 mb-4">

                <div class="card shadow">

                    <div class="card-body">

                        <h4>
                            <?= esc($doctor['name']) ?>
                        </h4>

                        <p>
                            Specialization:
                            <?= esc($doctor['specialization']) ?>
                        </p>

                        <p>
                            Experience:
                            <?= esc($doctor['experience']) ?> Years
                        </p>

                        <p>
                            Phone:
                            <?= esc($doctor['phone']) ?>
                        </p>

                        <a href="/patient/book/<?= $doctor['id'] ?>"
                          class="btn btn-primary">
                          Book Appointment
                        </a>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>