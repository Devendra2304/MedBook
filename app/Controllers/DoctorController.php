<?php

namespace App\Controllers;
use App\Models\AppointmentModel;

class DoctorController extends BaseController
{
    public function dashboard()
    {
        if (!session()->get('logged_in') || session()->get('role') != 'doctor')
        {
            return redirect()->to('/login');
        }
        return view('doctor/dashboard');
    }


    public function appointments()
    {
        if (!session()->get('logged_in') || session()->get('role') != 'doctor')
        {
            return redirect()->to('/login');
        }

        $appointmentModel = new AppointmentModel();

        $appointments = $appointmentModel
            ->select('appointments.*, users.name as patient_name')
            ->join('users', 'users.id = appointments.patient_id')
            ->where(
                'appointments.doctor_id',
                 session()->get('doctor_id')
            )
            ->findAll();

        return view('doctor/appointments', [
            'appointments' => $appointments
        ]);
    }

    public function rejectAppointment($id)
    {
        if (!session()->get('logged_in') || session()->get('role') != 'doctor')
        {
            return redirect()->to('/login');
        }

        $appointmentModel = new AppointmentModel();

        $appointmentModel->update($id, [
            'status' => 'Rejected'
        ]);

        return redirect()->to('/doctor/appointments');
    }

    public function approveAppointment($id)
    {
        if (!session()->get('logged_in') || session()->get('role') != 'doctor')
        {
            return redirect()->to('/login');
        }

        $appointmentModel = new AppointmentModel();

        $appointmentModel->update($id, [
            'status' => 'Approved'
        ]);

        return redirect()->to('/doctor/appointments');
    }

}