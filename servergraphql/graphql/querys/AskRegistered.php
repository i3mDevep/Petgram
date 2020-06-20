<?php

namespace Graphql\querys;

use App\Controllers\CSuperUsers;
use App\Models\Authentication;
use App\Models\Register;
use GraphQL\Type\Definition\Type;

class AskRegistered
{
    public static function query($returnType)
    {
        /*Este query es solo para desarrollo es decir que se
        necesita ser superusuario para ver estos registro*/

        $response = [
            'type' => Type::listOf($returnType),
            'resolve' => function ($root, $args,$context) {
                $res = Authentication::getData($context);
                if (!CSuperUsers::authentification($res->email, $res->password)) {
                    header('Content-Type: application/json');
                    echo json_encode(
                        ["message" => "Acceso denegado como super usuario :(", "error" => true]);
                    exit();
                }
                $registed = Register::all()->toArray();
                return $registed;
            }
        ];
        return $response;
    }
}
