<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'ta';
    protected $fillable = ['tahun'];

    public function mahasiswa()
    {
    	return $this->hasMany('App\Mahasiswa');
    }
}
