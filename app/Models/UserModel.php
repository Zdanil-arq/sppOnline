<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'nis', 'userpassword', 'role'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'username'    => 'required',
        'nis'         => 'required|is_unique[users.nis]',
        'userpassword' => 'required|min_length[8]',
        'role'        => 'in_list[admin,siswa]'
    ];

    protected $validationMessages = [
        'nis' => [
            'is_unique' => 'NIS ini sudah terdaftar, silakan gunakan NIS lain.'
        ]
    ];

    protected $skipValidation = false;
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['userpassword'])) {
            return $data;
        }

        $data['data']['userpassword'] = password_hash($data['data']['userpassword'], PASSWORD_DEFAULT);
        return $data;
    }
}
