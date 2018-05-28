<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaRequest;
use App\TahunAkademik as Angkatan;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->key) {
    		$mahasiswa = Mahasiswa::when($request->key, function ($query) use ($request) {
    			$query->where('stambuk', 'like', "%{$request->key}%")
				->orWhere('nama', 'like', "%{$request->key}%")
				->orWhereHas('angkatan', function ($query) use ($request) {
					$query->where('tahun', 'like', "%{$request->key}%");
				});
    		})->orderBy('stambuk', 'DESC')->simplePaginate(10);

    		$key = $request->key;
    		return view('admin.mahasiswa.index', compact('mahasiswa', 'key'));
    	}

    	$mahasiswa = Mahasiswa::orderBy('stambuk', 'DESC')->simplePaginate(10);
    	return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
    	$taList = Angkatan::orderBy('tahun', 'DESC')->get();
    	return view('admin.mahasiswa.create', compact('taList'));
    }

    public function store(MahasiswaRequest $request)
    {
    	$ta = Angkatan::firstOrCreate(['tahun' => $request->ta]);

    	$mahasiswa = Mahasiswa::create([
    		'stambuk' => $request->stambuk,
    		'nama' => $request->nama,
    		'ta_id' => $ta->id,
    	]);

    	return redirect()->route('mahasiswa.index')->withSuccess('Mahasiswa telah ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
    	$taList = Angkatan::orderBy('tahun', 'DESC')->get();
    	return view('admin.mahasiswa.edit', compact('mahasiswa', 'taList'));
    }

    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
    	$ta = Angkatan::firstOrCreate(['tahun' => $request->ta]);

    	$mahasiswa->update([
    		'stambuk' => $request->stambuk,
    		'nama' => $request->nama,
    		'ta_id' => $ta->id,
    	]);

    	return redirect()->route('mahasiswa.index')->withSuccess('Data mahasiswa telah diupdate.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
    	$mahasiswa->delete();
    	return redirect()->back()->withSuccess('Data mahasiswa telah dihapus.');
    }
}
