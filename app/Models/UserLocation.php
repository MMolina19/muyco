<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'province_id',
        'city',
        'address',
    ];

    protected $table = 'user_location';
    protected $primaryKey = 'id';

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
