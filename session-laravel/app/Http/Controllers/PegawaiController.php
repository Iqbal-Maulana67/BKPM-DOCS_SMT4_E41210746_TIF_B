<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PegawaiController extends Controller
{
    public function index($nama){
        return $nama;
    }

    public function index_segment(Request $request){
        return $request->segment(2); // Akan menampilkan nama setelah pegawai.
    }

    public function formulir(){
        return view('formulir');
    }

    public function proses(Request $request){
        $messages = [
            'required' => 'Input :attribute wajib diisi',
            'min' => 'Input :attribute harus diisi minimal :min karakter!',
            'max' => 'Input :attribute harus diisi maksimal :max karakter!',
        ];

        $this->validate($request, [
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha'
        ], $messages);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama: " . $nama . ", Alamat: " . $alamat;
    }
}
