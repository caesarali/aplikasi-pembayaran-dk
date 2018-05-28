<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mahasiswa;
use App\DK;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->level->name == 'teller') {
            $dk = DK::orderBy('created_at', 'DESC')->paginate(10);
            if ($request->s) {
                $mahasiswa = Mahasiswa::where('stambuk', $request->s)->first();
                if ($mahasiswa == null) {
                    $error = 'Data tidak ditemukan.';
                    return view('bank.index', compact('error', 'dk'));
                }
                return view('bank.index', compact('mahasiswa', 'dk'));
            }
            return view('bank.index', compact('dk'));
        }

        if ($request->key) {
            $mahasiswa = Mahasiswa::when($request->key, function ($query) use ($request) {
                $query->where('stambuk', 'like', "%{$request->key}%")
                ->orWhere('nama', 'like', "%{$request->key}%")
                ->orWhereHas('angkatan', function ($query) use ($request) {
                    $query->where('tahun', 'like', "%{$request->key}%");
                });
            })->orderBy('stambuk', 'DESC')->paginate(10);

            $key = $request->key;
            return view('bem.index', compact('mahasiswa', 'key'));
        }
        $mahasiswa = Mahasiswa::orderBy('stambuk', 'DESC')->paginate(10);
        return view('bem.index', compact('mahasiswa'));
    }
}
