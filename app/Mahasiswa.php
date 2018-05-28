<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['stambuk', 'nama', 'ta_id'];

    public function angkatan()
    {
    	return $this->belongsTo('App\TahunAkademik', 'ta_id');
    }

    public function dk()
    {
    	return $this->hasMany('App\DK');
    }

    public function cekSemester()
    {
        // Tahun sekarang dan Tahun Angkatan Mahasiswa
        $nowY = date('Y');
        $angkatanMahasiswa = $this->angkatan->tahun;

        // Menentukan ganjil / genap
        $nowM = date('m');
        $ganjil = [9, 10, 11, 12, 1, 2];
        $genap = [3, 4, 5, 6, 7, 8];
        if ($nowM >= min($genap) and $nowM <= max($genap)) {
            $semester = 'genap';
        } else {
            $semester = 'ganjil';
        }

        // Menghitung Tingkatan Semester Mahasiswa
        // Jika semester genap
        $semesterMahasiswa = ($nowY - $angkatanMahasiswa) * 2;

        // Jika semester ganjil
        if ($semester === 'ganjil' and $nowM < min($genap)) {
            $semesterMahasiswa = $semesterMahasiswa - 1;
        } elseif ($semester === 'ganjil' and $nowM > max($genap)) {
            $semesterMahasiswa = $semesterMahasiswa + 1;
        }

        // Update Semester Mahasiswa
        return $semesterMahasiswa;
    }
}
