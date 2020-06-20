<?php

use App\Controllers\CUsers;
use App\Models\Authentication;
use GraphQL\Type\Definition\Type;

$Mutation_add_user = [
    'addRegisterUser' => [
        'type' => $globalTokenType,
        'args' => [
            'name' => Type::nonNull(Type::string()),
            'email' => Type::nonNull(Type::string()),
            'cellphone' => Type::nonNull(Type::string()),
            'phone' => Type::string(),
            'address' => Type::nonNull(Type::string()),
            'password' => Type::nonNull(Type::string())
        ],
        'resolve' => function ($root, $args) {
            CUsers::AddnewUsers($args);
            $tokenEncript = Authentication::setEncrypToken(
                ['email' => $args['email'], 'password' => $args['password']]
            );
            return ['token' => $tokenEncript];
        }
    ]
];
