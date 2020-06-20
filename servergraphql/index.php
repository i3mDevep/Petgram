<?php
/*PARA HACER DEBUGGIN CAMBIE LA RUTA EN SU CONFIGURACION DE APACHE
A LA RUTA EN LA QUE CORRE SU PROYECTO*/
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}

require_once 'vendor/autoload.php';

use App\Models\Photos;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'mygraphql',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

require('graphql/boot.php');

//$photo = Photos::find(5);
//$like = $photo->liked()->where('email','mayxool.11@gmail.com')->get();
//echo json_encode($like);


//$a = SuperUsers::all() -> toArray();
//var_dump($a);

// $headers = getallheaders();
// if($headers['Authorization']){
//     $res = array();
//     echo $headers['Authorization'];
// }else{
//     echo "nada";
// }

// header('Content-Type: application/json');
// $myObj->name = "John";
// $myObj->age = 30;
// $myObj->city = "New York";

// $myJSON = json_encode($myObj);
// http_response_code(200);
// echo $myJSON;

// $register = new Register([
//     'Name' => 'Cusco',
//     'Email' => 'cusco@gmail.com',
//     'Cellphone' => '3243432432',
//     'Phone' => '323',
//     'Address' => 'cll 11dd7b',
//     'Password' => 'Cuscofeo9'

// ]);
//$a = SuperUsers::Where([['name','michael Atehortua Henao'],['password','Camilofeo9.']])->exists();
//var_dump($a);
//$b = VerifSuperusers::authentification('mayxol.11@gmail.com','Camilofeo9.');
//var_dump($b);


/*
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1OTAxODg4NDMsImV4cCI6MTU5MDE4ODg3MywiZGF0YSI6eyJlbWFpbCI6Implc3VzQGdtYWlsLmNvbSIsInBhc3N3b3JkIjoiZWwxMC4ifX0.Gwok_YCL3qtatHjDFsDl-Qaylh-Py-KZzydXyU2dgjo
*/

/*
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1OTAxOTA1NDIsImV4cCI6MTU5MDE5NDE0MiwiZGF0YSI6eyJlbWFpbCI6InN1cGVyQWRtaW5AZ21haWwuY29tIiwicGFzc3dvcmQiOiJTdXBlckFkbWluLiJ9fQ.4bljGFrIuQ-wXUbWNFXg0SEgeiOCoGhmCmj9mj2iit8
*/
// $a = Photos::where('categoryid', 2)
//     ->orderBy('likes','desc')
//     ->get()
//     ->toArray();
//
// $a = 3;
// $registed =
//   Photos::find(15)
//     ->increment('likes');

// var_dump($registed);
