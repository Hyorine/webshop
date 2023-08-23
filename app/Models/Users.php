<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    	protected $table = 'useres';
		protected $primaryKey = 'u_ID';
		public $timestamps = false;
		
		protected $fillable = [
		'u_ID',
		'u_email',
		'u_password',
		'u_registration',
		'u_active',
		'u_jog',
	];
	protected $hidden = [
		'password',
		'remember_token',
	];
}