<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Likeme extends Model
{
    protected $table = "likeme";
    public $timestamps = false;
    protected $fillable = ['email', 'idphoto'];
}
