<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Collection;

class Image extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'product_id',
        'product_slug',
        'collection_id',
        'collection_slug',
        'path',
        'url',
        'extension',
    ];

    protected $table = 'images';
    protected $primaryKey = 'id';

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function collections() {
        return $this->belongsToMany(Collection::class)->withTimestamps();
    }
}
