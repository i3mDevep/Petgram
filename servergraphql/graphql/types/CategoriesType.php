<?php

namespace Graphql\types;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class CategoriesType
{
    public static function getType()
    {
        $categoriesType = new ObjectType(([
            'name' => 'Categories',
            'description' => 'Type categories data',
            'fields' => [
                'id' => Type::int(),
                'name' => Type::string(),
                'emoji' => Type::string(),
                'cover' => Type::string(),
                'path' => Type::string()
            ]
        ]));
        return $categoriesType;
    }
}
