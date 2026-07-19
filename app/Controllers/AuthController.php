<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DoctorModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerUser()
    {
        $userModel = new UserModel();

        $userId = $userModel->insert([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        ),
            'role'     => $this->request->getPost('role')
        ]);

        if ($this->request->getPost('role') == 'doctor')
        {
            $doctorModel = new DoctorModel();

            $doctorModel->insert([
                'user_id'        => $userId,
                'specialization' => $this->request->getPost('specialization'),
                'experience'     => $this->request->getPost('experience'),
                'phone'          => $this->request->getPost('phone')
            ]);
        }

        return redirect()->to('/login');
    }

    public function loginUser()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        $user = $userModel
            ->where('email', $email)
            ->where('role', $role)
            ->first();

        if ($user && password_verify($password, $user['password']))
        {
            $doctorId = null;

            if ($user['role'] == 'doctor')
            {
                $doctorModel = new DoctorModel();

                $doctor = $doctorModel
                    ->where('user_id', $user['id'])
                    ->first();

            if ($doctor)
            {
                $doctorId = $doctor['id'];
            }
        }

            session()->set([
                'user_id' => $user['id'],
                'doctor_id' => $doctorId,
                'name'    => $user['name'],
                'role'    => $user['role'],
                'logged_in' => true
            ]);

            if ($user['role'] == 'doctor')
            {
                return redirect()->to('/doctor/dashboard');
            }

            return redirect()->to('/patient/dashboard');
        }

        return redirect()->back()->with(
            'error',
            'Invalid Credentials'
        );
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}