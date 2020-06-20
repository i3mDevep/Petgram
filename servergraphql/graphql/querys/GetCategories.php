<?php

namespace Graphql\querys;

use App\Models\Categories;
use GraphQL\Type\Definition\Type;

class GetCategories
{
    public static function query($returnType)
    {
        $response = [
            'type' => Type::listOf($returnType),
            'resolve' => function ($root, $args) {
                $registed = Categories::all()->toArray();
                return $registed;
            }
        ];
        return $response;
    }
}
