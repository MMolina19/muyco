<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialMedia extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'instagram',
        'facebook',
    ];

    protected $table = 'user_social_media';
    protected $primaryKey = 'id';

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
