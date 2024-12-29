<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'telp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'customer_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'customer_id');
    }

    public function growplans()
    {
        return $this->hasMany(GrowPlan::class, 'customer_id');
    }
}
