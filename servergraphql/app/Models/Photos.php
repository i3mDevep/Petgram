<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = "photos";
    public $timestamps = false;
    protected $fillable = ['id', 'categoryid', 'src', 'userid', 'likes'];

    public function liked(){
        return $this->hasMany(Likeme::class,'idphoto');
    }
}
