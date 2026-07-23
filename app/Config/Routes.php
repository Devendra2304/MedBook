<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');

$routes->post('/registerUser', 'AuthController::registerUser');
$routes->post('/loginUser', 'AuthController::loginUser');

$routes->get('/logout', 'AuthController::logout');

$routes->get('/patient/dashboard', 'PatientController::dashboard');

$routes->get('/doctor/dashboard', 'DoctorController::dashboard');
$routes->get('/patient/doctors', 'PatientController::doctors');

$routes->get(
    '/patient/book/(:num)',
    'PatientController::bookAppointment/$1'
);

$routes->post(
    '/patient/save-appointment',
    'PatientController::saveAppointment'
);

$routes->get(
    '/patient/appointments',
    'PatientController::appointments'
);
$routes->get(
    '/doctor/appointments',
    'DoctorController::appointments'
);

$routes->get(
    '/doctor/approve/(:num)',
    'DoctorController::approveAppointment/$1'
);

$routes->get(
    '/doctor/reject/(:num)',
    'DoctorController::rejectAppointment/$1'
);

$routes->get(
    '/doctor/record/(:num)',
    'DoctorController::recordForm/$1'
);

$routes->post(
    '/doctor/save-record',
    'DoctorController::saveRecord'
);

$routes->get(
    '/patient/records',
    'PatientController::records'
);
