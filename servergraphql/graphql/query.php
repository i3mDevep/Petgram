<?php


use GraphQL\Type\Definition\ObjectType;
use Graphql\querys\AskRegistered;
use Graphql\querys\GetCategories;
use Graphql\querys\GetPhotos;
use Graphql\querys\GetSinglePhotos;

$rootQuery = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'getRegisteredUsers' => AskRegistered::query($globalRegisterType),
        'getCategories' => GetCategories::query($globalCategories),
        'getPhotos' => GetPhotos::query($globalPhotosType),
        'getSinglePhotos' => GetSinglePhotos::query($globalPhotosType)
    ]
]);
