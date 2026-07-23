<!DOCTYPE html>
<html>
<head>
    <title>Add Medical Record</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Add Medical Record</h2>

    <div class="card mb-4">

        <div class="card-body">

            <h4><?= esc($appointment['patient_name']) ?></h4>

            <p><strong>Date:</strong> <?= esc($appointment['appointment_date']) ?></p>

            <p><strong>Symptoms:</strong> <?= esc($appointment['symptoms']) ?></p>

        </div>

    </div>

    <form method="post" action="/doctor/save-record">

        <input type="hidden"
               name="appointment_id"
               value="<?= $appointment['id'] ?>">

        <input type="hidden"
               name="patient_id"
               value="<?= $appointment['patient_id'] ?>">

        <input type="hidden"
               name="doctor_id"
               value="<?= session()->get('doctor_id') ?>">

        <div class="mb-3">

            <label class="form-label">Diagnosis</label>

            <textarea
                name="diagnosis"
                class="form-control"
                rows="3"
                required></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">Prescription</label>

            <textarea
                name="prescription"
                class="form-control"
                rows="3"
                required></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">Notes</label>

            <textarea
                name="notes"
                class="form-control"
                rows="3"></textarea>

        </div>

        <button class="btn btn-success">
            Save Medical Record
        </button>

    </form>

</div>

</body>
</html>