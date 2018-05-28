<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DK extends Model
{
    protected $table = 'dk';
    protected $fillable = ['mahasiswa_id', 'bayar', 'user_id'];

    public function mahasiswa()
    {
    	return $this->belongsTo('App\Mahasiswa');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
