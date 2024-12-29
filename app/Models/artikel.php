<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';
    protected $fillable = [
        'tittle',
        'photo',
        'text',
    ];

    public function customers() {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }
}
