<?php

namespace Graphql\types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class RegisterType
{
    public static function getType()
    {
        $registerType = new ObjectType(([
            'name' => 'Register',
            'description' => 'Type register data',
            'fields' => [
                'id' => Type::int(),
                'name' => Type::string(),
                'email' => Type::string(),
                'cellphone' => Type::string(),
                'phone' => Type::string(),
                'address' => Type::string(),
                'dateregister' => Type::string(),
                'password' => Type::string()
            ]
        ]));
        return $registerType;
    }
}
