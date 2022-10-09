<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
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

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function ability($permiss)
    // {
    //     $role = $this->roles;
    //     if (!$role)
    //         return false;

    //     foreach ($role->permissions as $databasePremissions) {
    //         if (is_array($permission) && in_array($databasePremissions, $permission))
    //             return true;
    //         elseif (is_string($permission) &&  strcmp($permission, $databasePremissions))
    //             return true;
    //     }
    //     return false;
    // }


    {
        $roles = $this->roles;
        if (!$roles)
            return false;

        foreach ($roles->permissions as $permission) {
            if (is_array($permiss) && in_array($permission, $permiss))
                return true;
            elseif (is_string($permiss) && $permiss == $permission)
                return true;
        }
        return false;
    }
}