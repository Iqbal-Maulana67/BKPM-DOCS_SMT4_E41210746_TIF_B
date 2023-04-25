<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengalamanKerjaController extends Controller  
{
    public function index(){
        $pengalaman_kerja = DB::table('pengalaman_kerja')->get();
        return view('backend.layouts.index', compact('pengalaman_kerja'));
    }

    public function create(){
        $pengalaman_kerja = null;
        return view('backend.layouts.create', compact('pengalaman_kerja'));
    }

    public function store(Request $request){
        DB::table('pengalaman_kerja')->insert([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'tahun_masuk' => $request->input('tahun_masuk'),
            'tahun_keluar' => $request->input('tahun_keluar')
        ]);

        return view('backend.layouts.index');
    }

    public function edit($id){
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
        return view('backend.layouts.create', compact('pengalaman_kerja'));
    }

    public function update(Request $request){
        DB::table('pengalaman_kerja')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ]);

        return redirect()->route('pengalaman_kerja.index')->with('success', 'Pengalaman Kerja berhasil diperbaharui.');
    }

    public function destroy($id){
        DB::table('pengalaman_kerja')->where('id', $id)->delete();
        return redirect()->route('pengalaman_kerja.index')->with('success', 'Data pengalaman kerja berhasil dihapus');
    }
}
