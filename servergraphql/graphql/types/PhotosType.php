<?php

namespace Graphql\types;

use App\Models\Authentication;
use App\Models\Photos;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class PhotosType
{
    public static function getType()
    {
        $photosType = new ObjectType(([
            'name' => 'Photos',
            'description' => 'Type photos data',
            'fields' => [
                'id' => Type::int(),
                'categoryid' => Type::int(),
                'src' => Type::string(),
                'userid' => Type::int(),
                'likes' => Type::int(),
                'liked' => [
                    'type' => Type::boolean(),
                    'resolve' => function ($root, $args, $context) {
                        $info = Authentication::getDataContinuos($context);
                        if(!$info){
                            return false;
                        }
                        $photo = Photos::find($root['id']);
                        $like = $photo->liked()->where('email',$info->email)->exists();
                        return $like;
                    }
                ]
            ]
        ]));
        return $photosType;
    }
}
