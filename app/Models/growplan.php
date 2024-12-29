<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class growplan extends Model
{
    use HasFactory;

    protected $table = 'growplans';
    protected $fillable = [
        'tittle',
        'seed',
        'land',
        'soil',
        'tanggal',
    ];

    public function growplans() {
        return $this->belongsTo(growplan::class, 'customer_id', 'id');
    }
}
