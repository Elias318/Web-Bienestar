<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use function Laravel\Prompts\password;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = "usuarios";
    protected $primaryKey = "id";

    protected $fillable = [
        'username',
        'nombre',
        'apellido',
        'password',
        'email',
        'rol',
        'edad',
        'peso',
        'imgDePerfil'
    ];

    protected $hidden =[
        'password'
    ];




}
