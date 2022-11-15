<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wood extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'active',
    ];

    protected $table = 'woods';
    protected $primaryKey = 'id';

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
