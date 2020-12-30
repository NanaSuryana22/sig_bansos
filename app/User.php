<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $searchableColumns = ['email'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles)
    {
        if(is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'Tindakan ini tidak authorized.');
        }
        return $this->hasRole($roles) || abort(401, 'Tindakan ini tidak authorized.');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function kecamatans()
    {
        return $this->hasMany('App\Kecamatan', 'user_id');
    }

    public function desas()
    {
        return $this->hasMany('App\Desa', 'user_id');
    }

    public function pelaporans()
    {
        return $this->hasMany('App\Pelaporan', 'user_id');
    }
}
