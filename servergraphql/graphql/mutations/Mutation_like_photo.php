<?php

use App\Controllers\CLike;
use App\Models\Authentication;
use App\Models\Likeme;
use App\Models\Photos;
use GraphQL\Type\Definition\Type;

$Mutation_like_photo = [
    'likePhoto' => [
        'type' => $globalPhotosType,
        'args' => [
            'id' => Type::nonNull(Type::int()),
        ],
        'resolve' => function ($root, $args,$context) {
            $info = Authentication::getData($context);
            CLike::operationLike($info->email,$args['id']);
            $response = Photos::find($args['id']);
            return $response->toArray();
        }
    ]
];
