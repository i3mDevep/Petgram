<?php

use App\Models\Authentication;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;

require('globaltypes.php');
require('query.php');
require('mutations.php');

$schema = new Schema([
    'query' => $rootQuery,
    'mutation' => $rootMutation,
]);

try {
  $rawInput = file_get_contents('php://input');
  $input = json_decode($rawInput,true);
  $query = isset($input['query'] )?$input['query']:[];
  $variables = isset($input['variables'])?$input['variables']:[];
  $token = Authentication::getTokenid($_SERVER["HTTP_AUTHORIZATION"]);
  $result = GraphQL::executeQuery($schema,$query,null,$token,$variables);
  $output = $result->toArray();
}catch(\Exception $e){
  $output = [
      'error' => [
          'message' => $e->getMessage()
      ]
    ];
}

header('Content-Type: application/json');
echo json_encode($output);