<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'business_name',
        'email',
        'phone_number',
        'password',
        'id_sub_sektor',
        'business_category'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
