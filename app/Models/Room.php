<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'active',
    ];

    protected $table = 'rooms';
    protected $primaryKey = 'id';

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
