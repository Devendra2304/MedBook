<?php

namespace App\Controllers;

use App\Models\UserModel;

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

        $userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role'     => $this->request->getPost('role')
        ]);

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
            session()->set([
                'user_id' => $user['id'],
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