<?php

namespace App\Controllers;
use App\Models\AppointmentModel;
use App\Models\PatientRecordModel;

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

    public function recordForm($appointmentId)
    {
    if (!session()->get('logged_in') || session()->get('role') != 'doctor')
    {
        return redirect()->to('/login');
    }

    $appointmentModel = new AppointmentModel();
    $recordModel = new PatientRecordModel();

    $existingRecord = $recordModel
        ->where('appointment_id', $appointmentId)
        ->first();

    if ($existingRecord)
    {
        return redirect()->to('/doctor/appointments')
                         ->with('error', 'Medical record already exists for this appointment.');
    }

    $appointment = $appointmentModel
        ->select('appointments.*, users.name as patient_name')
        ->join('users', 'users.id = appointments.patient_id')
        ->where('appointments.id', $appointmentId)
        ->where('appointments.doctor_id', session()->get('doctor_id'))
        ->first();

    if (!$appointment)
    {
        return redirect()->to('/doctor/appointments')
                         ->with('error', 'Appointment not found.');
    }

    return view('doctor/add_record', [
        'appointment' => $appointment
    ]);

    }

    public function saveRecord()
    {
        if (!session()->get('logged_in') || session()->get('role') != 'doctor')
        {
            return redirect()->to('/login');
        }

        $recordModel = new PatientRecordModel();

        $data = [
            'patient_id' => $this->request->getPost('patient_id'),
            'doctor_id' => $this->request->getPost('doctor_id'),
            'appointment_id' => $this->request->getPost('appointment_id'),
            'diagnosis' => $this->request->getPost('diagnosis'),
            'prescription' => $this->request->getPost('prescription'),
            'notes' => $this->request->getPost('notes')
        ];

        $recordModel->insert($data);

        return redirect()->to('/doctor/appointments')
                         ->with('success', 'Medical record saved successfully.');
    }
}