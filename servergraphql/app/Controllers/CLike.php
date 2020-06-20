<?php

namespace App\Controllers;

use App\Models\Likeme;
use App\Models\Photos;

class CLike
{
    protected static $email, $idphoto = "";

    public static function operationLike($email,$idphoto)
    {
        self::$email = $email;
        self::$idphoto = $idphoto;
        $filter = Likeme::Where([['email',$email],['idphoto',$idphoto]]);
        if(!$filter-> exists()){
            self::insertLike();
            return true;
        }else{
            self::deleteLike($filter);
            return false;
        }

    }
    private static function insertLike(){
        $like = new Likeme([
            'email' =>  self::$email,
            'idphoto' => self::$idphoto
        ]);
        $like->save();
        Photos::find(self::$idphoto)
        ->increment('likes');
    }
    private static function deleteLike($filter){
        $filter -> delete();
        Photos::find(self::$idphoto)
        ->decrement('likes');
    }
}
