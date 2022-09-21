<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Pembayaran;
use App\Models\RawatInap;
use App\Models\Ruang;
use Illuminate\Http\Request;
use PDF;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pembayaran';
        $data = Pembayaran::orderBy('created_at', 'DESC')->get();
        return view('admin.pembayaran.index', compact([
            'title', 'data'
        ]));
    }

    public function export()
    {
        $title = 'Pembayaran';
        $data = Pembayaran::orderBy('created_at', 'DESC')->get();
        // return view('admin.pembayaran.export', compact([
        //     'title', 'data'
        // ]));

        $pdf = PDF::loadview('admin.pembayaran.export', compact('data', 'title'));
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $title = 'Tambah Pembayaran';
        $data = RawatInap::where('id', $id)->first();
        return view('admin.pembayaran.create', compact([
            'title', 'data'
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
            'pasien_id' => 'required',
            'ruang_id' => 'required',
            'total' => 'required|string',
        ]);

        Pembayaran::create([
            'kode_pembayaran' => 'HL'.time(),
            'user_id' => auth()->user()->id,
            'pasien_id' => $request->pasien_id,
            'total' => $request->total,
            'status' => 'paid',
        ]);

        Pasien::where('id', $request->pasien_id)->update([
            'status' => 'done'
        ]);

        Ruang::where('id', $request->ruang_id)->update([
            'status' => 'unused'
        ]);

        return redirect()->to('/admin/pembayaran')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
