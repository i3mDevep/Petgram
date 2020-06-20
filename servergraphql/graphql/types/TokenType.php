<?php

namespace Graphql\types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class TokenType
{
    public static function getType()
    {
        $tokenType = new ObjectType(([
            'name' => 'Token',
            'description' => 'Return Token',
            'fields' => [
                'token' => Type::string()
            ]
        ]));
        return $tokenType;
    }
}
