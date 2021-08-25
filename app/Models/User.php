<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }

    public function save(array $options = array()) {
        if(isset($this->remember_token))
            unset($this->remember_token);

        return parent::save($options);
    }

    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     *  Check if the User has a role
     * @param string $role
     * @return bool
     */
    public function hasAnyRole(string $role){
        return null !==  $this->roles()->where('name', $role)->first();
        //this return true if role exist or null
    }

    /**
     *  Check if the User has any given role
     * @param array $role
     * @return bool
     */
    public function hasAnyRoles(array $role){
        return null !==  $this->roles()->whereIn('name',$role)->first();
        //this return true if role exist or null
    }
}
