<h1>Doctor Dashboard</h1>

<p>
Welcome <?= session()->get('name') ?>
</p>

<a href="/doctor/appointments">
    Manage Appointments
</a>

<p>Doctor ID: <?= session()->get('doctor_id') ?></p>

<a href="/logout">Logout</a>