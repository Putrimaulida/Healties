<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Pasien;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Pasien';
        $data = Pasien::with('dokter')
                        ->get();
        return view('admin.pasien.index', compact([
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
        $title = 'Data Pasien';
        $dokters = Dokter::all();
        return view('admin.pasien.create', compact([
            'title', 'dokters'
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
            'dokter_id' => 'required',
            'nik' => 'required|string',
            'nama_pasien' => 'required|string',
            'alamat' => 'required|string',
            'keluhan' => 'required|string',
        ]);

        Pasien::create([
            'dokter_id' => $request->dokter_id,
            'nik' => $request->nik,
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'tanggal_datang' => Carbon::now(),
            'keluhan' => $request->keluhan,
            'status' => 'pending'
        ]);

        return redirect()->to('/admin/pasien')
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
        $title = 'Data Pasien';
        $dokters = Dokter::all();
        $data = Pasien::with('dokter')
                    ->where('id', $id)->first();
        return view('admin.pasien.show', compact([
            'title', 'data', 'dokters'
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
        $title = 'Data Pasien';
        $data = Pasien::with('dokter')
                    ->where('id', $id)->first();
        $dokters = Dokter::all();
        return view('admin.pasien.edit', compact([
            'title', 'data', 'dokters'
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
            'dokter_id' => 'required',
            'nik' => 'required|string',
            'nama_pasien' => 'required|string',
            'alamat' => 'required|string',
            'keluhan' => 'required|string',
        ]);

        Pasien::where('id', $id)->update([
            'dokter_id' => $request->dokter_id,
            'nik' => $request->nik,
            'nama_pasien' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'tanggal_datang' => Carbon::now(),
            'keluhan' => $request->keluhan,
            'status' => $request->status,
        ]);

        return redirect()->to('/admin/pasien')
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
        Pasien::where('id', $id)->delete();
        return redirect()->to('/admin/pasien')
                    ->with('success', 'Data berhasil dihapus');
    }
}
