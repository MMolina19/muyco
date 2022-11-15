<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upholstered extends Model{ //tapizados
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'active',
    ];

    protected $table = 'upholstered';
    protected $primaryKey = 'id';

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
