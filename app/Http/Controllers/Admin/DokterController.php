<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Dokter';
        $data = Dokter::withCount('pasien')
                        ->get();
        return view('admin.dokter.index', compact([
            'title', 'data'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Data Dokter';
        return view('admin.dokter.create', compact([
            'title'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|string',
            'alamat' => 'required|string',
            'spesialis' => 'required|string',
        ]);

        Dokter::create([
            'nama_dokter' => $request->nama_dokter,
            'alamat' => $request->alamat,
            'spesialis' => $request->spesialis,
            'kode_dokter' => 'DK'.Str::random(8),
        ]);

        return redirect()->to('/admin/dokter')
                    ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Data Dokter';
        $data = Dokter::withCount('pasien')
                    ->where('id', $id)->first();
        return view('admin.dokter.show', compact([
            'title', 'data'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Data Dokter';
        $data = Dokter::withCount('pasien')
                    ->where('id', $id)->first();
        return view('admin.dokter.edit', compact([
            'title', 'data'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required|string',
            'alamat' => 'required|string',
            'spesialis' => 'required|string',
        ]);

        Dokter::where('id', $id)->update([
            'nama_dokter' => $request->nama_dokter,
            'alamat' => $request->alamat,
            'spesialis' => $request->spesialis,
        ]);

        return redirect()->to('/admin/dokter')
                    ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dokter::where('id', $id)->delete();
        return redirect()->to('/admin/dokter')
                    ->with('success', 'Data berhasil dihapus');
    }
}
