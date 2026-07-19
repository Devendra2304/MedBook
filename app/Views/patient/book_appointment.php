<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Book Appointment</h2>

    <h4>
        Doctor:
        <?= esc($doctor['name']) ?>
    </h4>

    <p>
        <?= esc($doctor['specialization']) ?>
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

    <form method="post"
          action="/patient/save-appointment">

        <input type="hidden"
               name="doctor_id"
               value="<?= $doctor['id'] ?>">

        <div class="mb-3">

            <label>Date</label>

            <input type="date"
                   name="appointment_date"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label>Time</label>

            <input type="time"
                   name="appointment_time"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label>Symptoms</label>

            <textarea
                name="symptoms"
                class="form-control"
                rows="4"
                required></textarea>

        </div>

        <button class="btn btn-success">
            Book Appointment
        </button>

    </form>

</div>

</body>
</html>