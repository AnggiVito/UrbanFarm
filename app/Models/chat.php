<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    protected $table = 'chats';
    protected $fillable = [
        'name',
        'description',
    ];

    public function chats() {
        return $this->hasMany(chat::class, 'customer_id');
    }
}
