<?php

namespace App\Controllers;

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
}