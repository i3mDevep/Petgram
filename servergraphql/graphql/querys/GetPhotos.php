<?php

namespace Graphql\querys;

use App\Models\Photos;
use GraphQL\Type\Definition\Type;

class GetPhotos
{
    public static function query($returnType)
    {
        $response = [
            'type' => Type::listOf($returnType),
            'args' => [
                'categoryid'=>Type::int()
            ],
            'resolve' => function ($root, $args) {
                $registed = count($args) ?
                    Photos::where('categoryid', $args['categoryid'])
                        ->orderBy('likes','desc')
                        ->get()
                        ->toArray():
                    Photos::all()
                        ->toArray();
                return $registed;
            }
        ];
        return $response;
    }
}
