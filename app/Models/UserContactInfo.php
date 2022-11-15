<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContactInfo extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'phone',
        'mobile',
    ];

    protected $table = 'user_contact_info';
    protected $primaryKey = 'id';

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

}
