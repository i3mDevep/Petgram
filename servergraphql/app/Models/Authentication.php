<?php
/* Recordadotios para mi sobre POO
existen atributos y metodos en la clases,
cuando un metodo no instancia ningun objeto
se tienen que poner como metodos estaticos,
el uso de this es para hacer referencia a que el metodo
o atributo se refiere a ese objeto en particular,
self es analogo a this pero en metodos staticos,
se usa un constructor para para variables de entrada a la
clase creada
*/

namespace App\Models;

use Exception;
use Firebase\JWT\JWT;
use stdClass;

class Authentication
{
    private static $secret_key = 'Sdw1s9x8@';
    private static $encrypt = ['HS256'];

    public static function getTokenid($bearer_token)
    {
        $token = isset(explode(" ", $bearer_token)[1]) ? explode(" ", $bearer_token)[1] : null;
        return $token;
    }
    public static function permissionToken($token)
    {
        //$jwt = JWT::encode($token, self::$secret_key);
        $tokencode = self::setEncrypToken(["name" => "michael", "edad" => 21]);
        $data = self::getData($tokencode);
        $data2 = self::getData();
        $data3 = self::getData($tokencode);

        return  $token;
    }
    public static function setEncrypToken($data)
    {
        $time = time();
        $tokenEncode = array(
            'iat' => $time, // Tiempo que inició el token
            'exp' => $time + (60 * 60), // Tiempo que expirará el token (+1 hora)
            'data' => $data
        );
        return JWT::encode($tokenEncode, self::$secret_key);
    }
    public static function getData($token = '')
    {
        if ($token == null || $token == '') {
            header('Content-Type: application/json');
            echo json_encode(
                ["message" => "Tu petición no tiene cabecera de autorización", "error" => true]
            );
            exit();
        }
        try {
            $response =
                JWT::decode(
                    $token,
                    self::$secret_key,
                    self::$encrypt
                )->data;
            $response->error = false;
        } catch (Exception $e) {
            header('Content-Type: application/json');
            $response = ["message" => $e->getMessage(), "error" => true];
            echo json_encode($response);
            exit();
        } finally {
            $resObject = new stdClass();
            foreach ($response as $tag => $value) {
                $resObject->$tag = $value;
            }
            return $resObject;
        }
    }

    public static function getDataContinuos($token = '')
    {
        if ($token == null || $token == '') {
            return false;
        }
        try {
            $response =
                JWT::decode(
                    $token,
                    self::$secret_key,
                    self::$encrypt
                )->data;
            $response->error = false;
        } catch (Exception $e) {
            return false;
        }
        $resObject = new stdClass();
        foreach ($response as $tag => $value) {
            $resObject->$tag = $value;
        }
        return $resObject;
    }
}
