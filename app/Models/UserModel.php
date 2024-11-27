<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'type'];

    public function addImage($userId, $imageName)
    {
        $data = [
            'user_id' => $userId,
            'image_name' => $imageName,
        ];
    }
}