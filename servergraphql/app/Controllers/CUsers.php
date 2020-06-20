<?php

namespace App\Controllers;

use App\Models\Register;
use Exception;

class CUsers
{
    public static function AddnewUsers($args)
    {
        $register = new Register([
            'name' => $args['name'],
            'email' => $args['email'],
            'cellphone' => $args['cellphone'],
            'phone' => isset($args['phone'])?$args['phone']:'',
            'address' => $args['address'],
            'password' => $args['password'],
        ]);
        try {
            $register->save();
        } catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(
                ["message" => $e->getMessage(), "error" => true,"code"=> $e->getCode()]
            );
            exit();
        }
    }
    public static function ExistUser($args)
    {
        return Register::Where([
            ['email', $args['email']], ['password', $args['password']]
        ])->exists();
    }
}
