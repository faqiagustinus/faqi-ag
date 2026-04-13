<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'public.pengguna';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = true;
    protected $hidden = ['password'];
}