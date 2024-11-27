<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        if (session()->get('type') !== 'standard') {
            return redirect()->to(base_url('login'));
        }

        return view('user/dashboard');
    }

    public function createImage() 
    {
        $name = $this->request->getPost('name');

        if (empty($name)) {
            return redirect()->to(base_url('user/dashboard'))->with('error', 'Text cannot be empty.');
        }

        $userId = session()->get('user_id');
        $username = session()->get('username');
        $folderName = $userId . '_' . $username;

        $imagePath = FCPATH . 'uploads/' . $folderName;
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0777, true);
        }

        $imageWidth = 500;
        $imageHeight = 500;
        $image = imagecreatetruecolor($imageWidth, $imageHeight);

        $textColor = imagecolorallocate($image, 25, 251, 0);
        $backgroundColor = imagecolorallocate($image, 25, 129, 172);
        imagefill($image, 0, 0, $backgroundColor);

        $fontSize = 5;
        $textX = ($imageWidth - (imagefontwidth($fontSize) * strlen($name))) / 2;
        $textY = ($imageHeight - imagefontheight($fontSize)) / 2;

        imagestring($image, $fontSize, $textX, $textY, $name, $textColor);

        $fileName = uniqid() . '.png';
        $filePath = $imagePath . '/' . $fileName;
        imagepng($image, $filePath);
        imagedestroy($image);

        return redirect()->to(base_url('user/dashboard'))->with('success', 'Image created successfully!');
    }

    public function dashboard()
    {
        return view('user/dashboard');
    }    
}