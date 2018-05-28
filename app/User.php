<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function dk()
    {
        return $this->hasMany('App\DK');
    }

    public function hasLevel($name)
    {
        if ($this->level->name === $name) {
            return true;
        }
        return false;
    }
}
