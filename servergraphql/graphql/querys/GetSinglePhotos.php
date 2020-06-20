<?php

namespace Graphql\querys;

use App\Models\Photos;
use GraphQL\Type\Definition\Type;

class GetSinglePhotos
{
    public static function query($returnType)
    {
        $response = [
            'type' => $returnType,
            'args' => [
                'id'=>Type::nonNull(Type::int())
            ],
            'resolve' => function ($root, $args) {
                $registed =
                  Photos::find($args['id']) -> toArray();
                return $registed;
            }
        ];
        return $response;
    }
}
