<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\RawatInap;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RawatInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Rawat Inap';
        $data = RawatInap::with('pasien')
                        ->with('ruang')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return view('admin.rawat_inap.index', compact([
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
        $title = 'Data Rawat Inap';
        $ruangs = Ruang::where('status', 'unused')->get();
        $pasiens = Pasien::where('status', 'pending')->get();
        return view('admin.rawat_inap.create', compact([
            'title', 'pasiens', 'ruangs'
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
            'ruang_id' => 'required',
            'pasien_id' => 'required',
        ]);

        RawatInap::create([
            'ruang_id' => $request->ruang_id,
            'pasien_id' => $request->pasien_id,
        ]);

        Pasien::where('id', $request->pasien_id)->update([
            'status' => 'treated'
        ]);

        Ruang::where('id', $request->ruang_id)->update([
            'status' => 'used'
        ]);

        return redirect()->to('/admin/rawat-inap')
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
        $title = 'Data Rawat Inap';
        $data = RawatInap::with('pasien')
                    ->with('ruang')
                    ->where('id', $id)->first();
        return view('admin.rawat_inap.show', compact([
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
        $title = 'Data Rawat Inap';
        $ruangs = Ruang::where('status', 'unused')->get();
        $pasiens = Pasien::where('status', 'pending')->get();
        $data = RawatInap::with('pasien')
                    ->with('ruang')
                    ->where('id', $id)->first();
        return view('admin.rawat_inap.edit', compact([
            'title', 'data', 'pasiens', 'ruangs'
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
            'ruang_id' => 'required',
            'pasien_id' => 'required',
        ]);

        RawatInap::where('id', $id)->update([
            'ruang_id' => $request->ruang_id,
            'pasien_id' => $request->pasien_id,
        ]);

        return redirect()->to('/admin/rawat-inap')
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
        RawatInap::where('id', $id)->delete();
        return redirect()->to('/admin/rawat-inap')
                    ->with('success', 'Data berhasil dihapus');
    }
}
