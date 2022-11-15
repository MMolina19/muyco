<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'condition',
        //'colors',
        //'materials',
        //'images',
        //'collections',
        //'product_types'
        'availability',
        'width',
        'height',
        'depth',
        'weight',
        'model_name',
        'gtin',
        'number_of_pieces',
        'design_type_id',
        'configuration',
        'product_type_id',
        'upholstery',
        'collection_id',
        'sku',
        'active',
    ];

    protected $table = 'products';
    protected $primaryKey = 'id';

    public function images() {
        return $this->belongsToMany(Image::class)->withTimestamps();
    }

    public function designsTypes() {
        return $this->belongsToMany(DesignType::class)->withTimestamps();
    }

    public function productsTypes() {
        return $this->belongsToMany(ProductType::class)->withTimestamps();
    }

    public function collections() {
        return $this->belongsToMany(Collection::class)->withTimestamps();
    }

    public function rooms() {
        return $this->belongsToMany(Room::class)->withTimestamps();
    }

}
