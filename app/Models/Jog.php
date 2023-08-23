<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Jog extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    	protected $table = 'Useres';
		protected $primaryKey = 'J_ID';
		public $timestamps = false;
		
		protected $fillable = [
		'J_megnevezes',
	];
}
