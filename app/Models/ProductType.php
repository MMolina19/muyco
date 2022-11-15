<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'active',
    ];

    protected $table = 'products_types';
    protected $primaryKey = 'id';

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

}
