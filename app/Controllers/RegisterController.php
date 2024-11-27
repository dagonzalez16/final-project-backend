<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        $userModel = new UserModel();

        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'type'     => 'required|in_list[standard,admin]'
        ];

        if (!$this->validate($rules)) {
            return view('register', ['validation' => $this->validator]);
        }

        $userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'type'     => $this->request->getPost('type'),
        ]);

        return redirect()->to(base_url('login'))->with('success', 'User registered successfully!');
    }
}