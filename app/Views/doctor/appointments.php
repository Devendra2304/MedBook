<!DOCTYPE html>
<html>
<head>
    <title>Manage Appointments</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Manage Appointments</h2>
    <?php if(session()->getFlashdata('success')): ?>

    <div class="alert alert-success">

        <?= session()->getFlashdata('success') ?>

    </div>

    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>

        <div class="alert alert-danger">

            <?= session()->getFlashdata('error') ?>

        </div>

    <?php endif; ?>

    <div class="row">

        <?php if(empty($appointments)): ?>

            <div class="alert alert-info">
                No appointments found.
            </div>

        <?php else: ?>

            <?php foreach($appointments as $appointment): ?>

                <div class="col-md-6 mb-4">

                    <div class="card shadow">

                        <div class="card-body">

                            <h4>
                                <?= esc($appointment['patient_name']) ?>
                            </h4>

                            <p>
                                Date:
                                <?= esc($appointment['appointment_date']) ?>
                            </p>

                            <p>
                                Time:
                                <?= esc($appointment['appointment_time']) ?>
                            </p>

                            <p>
                                Symptoms:
                                <?= esc($appointment['symptoms']) ?>
                            </p>

                            <p>
                                Status:
                                <strong>
                                    <?= esc($appointment['status']) ?>
                                </strong>
                            </p>

                            <?php if($appointment['status'] == 'Pending'): ?>

                                <a
                                    href="/doctor/approve/<?= $appointment['id'] ?>"
                                    class="btn btn-success">

                                    Approve

                                </a>

                                <a
                                    href="/doctor/reject/<?= $appointment['id'] ?>"
                                    class="btn btn-danger">

                                    Reject

                                </a>

                            <?php endif; ?>

                            <?php if($appointment['status'] == 'Approved'): ?>
                                <a
                                    href="/doctor/record/<?= $appointment['id'] ?>"
                                    class="btn btn-primary">

                                    Add Record
                                </a>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</div>

</body>
</html>