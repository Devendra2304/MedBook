<!DOCTYPE html>
<html>
<head>
    <title>My Health Records</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>My Health Records</h2>

    <?php if(empty($records)): ?>

        <div class="alert alert-info">
            No medical records found.
        </div>

    <?php else: ?>

        <?php foreach($records as $record): ?>

            <div class="card shadow mb-4">

                <div class="card-body">

                    <h4><?= esc($record['doctor_name']) ?></h4>

                    <hr>

                    <p>
                        <strong>Diagnosis:</strong><br>
                        <?= esc($record['diagnosis']) ?>
                    </p>

                    <p>
                        <strong>Prescription:</strong><br>
                        <?= esc($record['prescription']) ?>
                    </p>

                    <p>
                        <strong>Notes:</strong><br>
                        <?= esc($record['notes']) ?>
                    </p>

                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

</body>
</html>