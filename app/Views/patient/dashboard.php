<h1>Patient Dashboard</h1>

<p>
Welcome <?= session()->get('name') ?>
</p>

<a href="/patient/doctors">
View Doctors
</a>

<br><br>

<a href="/logout">Logout</a>