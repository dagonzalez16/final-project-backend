<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            
            session()->set([
                'id'   => $user['id'],
                'username' => $user['username'],
                'type' => $user['type'],
                'isLoggedIn' => true,
            ]);

            if ($user['type'] === 'admin') {
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                return redirect()->to(base_url('user/dashboard'));
            }
        }

        return redirect()->to(base_url('login'))->with('error', 'Invalid login credentials!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}