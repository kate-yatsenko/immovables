<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const ADMIN = 1;
    const CONTENT_MANAGER = 2;
    const GUEST = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public static function add($fields)
    {
        $user = new self;
        $user->fill($fields);
        $user->role_id = User::GUEST;
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function isCommonUser($role_id)
    {
        if($role_id != User::ADMIN && $role_id != User::CONTENT_MANAGER) {
            return true;
        }
        return false;
    }


    public function giveRole($role)
    {
        $this->role_id = $role;
        $this->save();
    }

    public function getRoleTitle()
    {
        return $this->role->title;
    }
}
