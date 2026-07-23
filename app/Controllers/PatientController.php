<?php

namespace App\Controllers;
use App\Models\DoctorModel;
use App\Models\UserModel;
use App\Models\AppointmentModel;
use App\Models\PatientRecordModel;

class PatientController extends BaseController
{
    public function dashboard()
    {
        if (!session()->get('logged_in') || session()->get('role') != 'patient')
        {
            return redirect()->to('/login');
        }
        return view('patient/dashboard');
    }
    public function doctors()
    {
        if (!session()->get('logged_in') || session()->get('role') != 'patient')
        {
            return redirect()->to('/login');
        }

        $doctorModel = new DoctorModel();

        $doctors = $doctorModel
            ->select('doctors.*, users.name')
            ->join('users', 'users.id = doctors.user_id')
            ->findAll();

        return view('patient/doctors', [
            'doctors' => $doctors
        ]);
    }

    public function bookAppointment($doctorId)
    {
        if (!session()->get('logged_in') || session()->get('role') != 'patient')
        {
            return redirect()->to('/login');
        }

        $doctorModel = new DoctorModel();

        $doctor = $doctorModel
            ->select('doctors.*, users.name')
            ->join('users', 'users.id = doctors.user_id')
            ->where('doctors.id', $doctorId)
            ->first();

        return view('patient/book_appointment', [
            'doctor' => $doctor
        ]);
    }

    public function saveAppointment()
    {
        if (!session()->get('logged_in') || session()->get('role') != 'patient')
        {
            return redirect()->to('/login');
        }

        $appointmentModel = new AppointmentModel();

        $doctorId = $this->request->getPost('doctor_id');
        $date = $this->request->getPost('appointment_date');
        $time = $this->request->getPost('appointment_time');

        $existingAppointment = $appointmentModel
            ->where('doctor_id', $doctorId)
            ->where('appointment_date', $date)
            ->where('appointment_time', $time)
            ->first();

        if ($existingAppointment)
        {
            return redirect()->back()
            ->with('error', 'This slot is already booked.');
        }

        $appointmentModel->save([
            'patient_id' => session()->get('user_id'),
            'doctor_id' => $doctorId,
            'appointment_date' => $date,
            'appointment_time' => $time,
            'symptoms' => $this->request->getPost('symptoms'),
            'status' => 'Pending'
        ]);
         
        $userModel = new UserModel();
        $patient = $userModel->find(session()->get('user_id'));

        $doctorModel = new DoctorModel();

        $doctor = $doctorModel
            ->select('doctors.*, users.name')
            ->join('users', 'users.id = doctors.user_id')
            ->where('doctors.id', $doctorId)
            ->first();
        
        $email = \Config\Services::email();
        $email->setTo($patient['email']);
        $email->setSubject('MedBook - Appointment Booking Confirmation');

        $email->setMessage("
            <h2>Appointment Booking Confirmation</h2>
            <p>Dear <strong>{$patient['name']}</strong>,</p>
            <p>Your appointment with Dr. {$doctor['name']} has been booked successfully.</p>
            <p><strong>Date:</strong> {$date}</p>
            <p><strong>Time:</strong> {$time}</p>
            <p><strong>Symptoms:</strong> {$this->request->getPost('symptoms')}</p>
            <p>Thank you for using MedBook!</p>");
            

        $email->send();            
        return redirect()->back()
            ->with('success', 'Appointment booked successfully.');
    }
    public function appointments()
    {
        if (!session()->get('logged_in') || session()->get('role') != 'patient')
        {
            return redirect()->to('/login');
        }

        $appointmentModel = new AppointmentModel();

        $appointments = $appointmentModel
            ->select('appointments.*, users.name as doctor_name')
            ->join('doctors', 'doctors.id = appointments.doctor_id')
            ->join('users', 'users.id = doctors.user_id')
            ->where('appointments.patient_id', session()->get('user_id'))
            ->findAll();

        return view('patient/appointments', [
            'appointments' => $appointments
        ]);
    }

    public function records()
    {
        if (!session()->get('logged_in') || session()->get('role') != 'patient')
        {
            return redirect()->to('/login');
        }

        $recordModel = new PatientRecordModel();

        $records = $recordModel
            ->select('patient_records.*, users.name as doctor_name')
            ->join('doctors', 'doctors.id = patient_records.doctor_id')
            ->join('users', 'users.id = doctors.user_id')
            ->where('patient_records.patient_id', session()->get('user_id'))
            ->findAll();

        return view('patient/records', [
            'records' => $records
        ]);
    }
}