<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Ruangan';
        $data = Ruang::withCount('rawat_inap')
                        ->get();
        return view('admin.ruang.index', compact([
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
        $title = 'Ruangan';
        return view('admin.ruang.create', compact([
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
            'ruang' => 'required|string',
        ]);

        Ruang::create([
            'ruang' => $request->ruang,
            'status' => 'unused'
        ]);

        return redirect()->to('/admin/ruang')
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
        $title = 'Ruangan';
        $data = Ruang::withCount('rawat_inap')
                    ->where('id', $id)->first();
        return view('admin.ruang.show', compact([
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
        $title = 'Ruangan';
        $data = Ruang::withCount('rawat_inap')
                    ->where('id', $id)->first();
        return view('admin.ruang.edit', compact([
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
            'ruang' => 'required|string',
        ]);

        Ruang::where('id', $id)->update([
            'ruang' => $request->ruang,
            'status' => 'unused'
        ]);

        return redirect()->to('/admin/ruang')
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
        Ruang::where('id', $id)->delete();
        return redirect()->to('/admin/ruang')
                    ->with('success', 'Data berhasil dihapus');
    }
}
