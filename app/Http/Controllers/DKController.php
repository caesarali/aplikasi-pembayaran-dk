<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DK;
use App\Mahasiswa;

class DKController extends Controller
{
    public function bayarDK(Request $request)
    {
        $messages = [
            'bayar.size' => 'Pembayaran DK wajib adalah Rp. 50.000,-'
        ];

        $rules = $request->validate([
            'bayar' => 'required|integer|size:50000'
        ], $messages);

    	$dk = DK::create([
    		'mahasiswa_id' => $request->mahasiswa_id,
    		'bayar' => $request->bayar,
    		'user_id' => auth()->id(),
    	]);

    	return redirect()->route('home')->withSuccess('Pembayaran Sukses.');
    }

    public function history()
    {
    	$dk = DK::orderBy('created_at')->paginate(10);
    	return view('bank.history', compact('dk'));
    }

    public function cekPembayaran(Request $request)
    {
    	if ($request->s) {
            $mahasiswa = Mahasiswa::where('stambuk', $request->s)->first();
            if ($mahasiswa == null) {
                $error = 'Data mahasiswa tidak ditemukan.';
                return view('bem.detail', compact('error'));
            }
            return view('bem.detail', compact('mahasiswa'));
        }
    	return view('bem.detail');
    }
}
