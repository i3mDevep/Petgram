<?php

use GraphQL\Type\Definition\ObjectType;

require('mutations/Mutation_like_photo.php');
require('mutations/Mutation_add_user.php');
require('mutations/Mutation_login_user.php');

$mutations = array();
$mutations += $Mutation_add_user;
$mutations += $Mutation_like_photo;
$mutations += $Mutation_login_user;


$rootMutation = new ObjectType([
    'name' => 'Mutation',
    'fields' => $mutations
]);