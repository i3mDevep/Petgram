<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = "registereduser";
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'cellphone', 'phone', 'address', 'dateregister', 'password', 'id'];
}
