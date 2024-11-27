<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        if (session()->get('type') !== 'admin') {
            return redirect()->to(base_url('login'));
        }

        return redirect()->to(base_url('admin/dashboard'));
    }

    public function dashboard()
    {
        if (session()->get('type') !== 'admin') {
            return redirect()->to(base_url('login'));
        }
    
        $userModel = new UserModel();
    
        $users = $userModel->where('type', 'standard')->findAll();
    
        return view('admin/dashboard', ['users' => $users]);
    }

    public function editUser($id)
    {
        if (session()->get('type') !== 'admin') {
            return redirect()->to(base_url('login'));
        }

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to(base_url('admin/dashboard'))->with('error', 'User not found.');
        }

        return view('admin/edit_user', ['user' => $user]);
    }

    public function updateUser($id)
    {
        if (session()->get('type') !== 'admin') {
            return redirect()->to(base_url('login'));
        }

        $userModel = new UserModel();

        $rules = [
            'username' => 'required|min_length[3]',
            'type'     => 'required|in_list[standard,admin]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $userModel->update($id, [
            'username' => $this->request->getPost('username'),
            'type'     => $this->request->getPost('type'),
        ]);

        return redirect()->to(base_url('admin/dashboard'))->with('success', 'User updated successfully!');
    }

    public function deleteUser($id)
    {
        if (session()->get('type') !== 'admin') {
            return redirect()->to(base_url('login'));
        }

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to(base_url('admin/dashboard'))->with('error', 'User not found.');
        }

        if ($user['type'] === 'admin') {
            return redirect()->to(base_url('admin/dashboard'))->with('error', 'Cannot delete an admin user.');
        }

        $userModel->delete($id);

        return redirect()->to(base_url('admin/dashboard'))->with('success', 'User deleted successfully!');
    }
}