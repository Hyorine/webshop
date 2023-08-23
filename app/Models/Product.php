<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    	protected $table = 'product';
		protected $primaryKey = 'p_id';
		public $timestamps = false;
		
		protected $fillable = [
        'p_id',
        'p_name',
        'p_type',
        'p_price',
        'p_available_start',
        'p_available_end',
        'p_description',
        'p_imageUrl',
        'p_admin' 
	];
}
