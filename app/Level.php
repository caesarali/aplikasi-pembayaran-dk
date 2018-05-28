<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $fillable = ['name'];

    public $timestamps = false;

    public function user()
    {
    	return $this->hasOne('App\User');
    }
}
