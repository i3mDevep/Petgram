<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperUsers extends Model
{
    protected $table = "superusers";
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'password'];
}
