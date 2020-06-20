<?php

use App\Controllers\CUsers;
use App\Models\Authentication;
use GraphQL\Type\Definition\Type;

$Mutation_login_user = [
    'loginUser' => [
        'type' => $globalTokenType,
        'args' => [
            'email' => Type::nonNull(Type::string()),
            'password' => Type::nonNull(Type::string())
        ],
        'resolve' => function ($root, $args) {
            $exist = CUsers::ExistUser($args);
            if (!$exist) {
                header('Content-Type: application/json');
                echo json_encode(
                    ["message" => "Verifica tus datos", "error" => true]
                );
                exit();
            }
            $token = Authentication::setEncrypToken($args);
            return ['token' => $token];
        }
    ]
];
