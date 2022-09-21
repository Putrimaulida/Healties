<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Admin';
        $data = User::where('role', 'admin')->get();
        return view('admin.users.index', compact([
            'title', 'data'
        ]));
    }

    public function staff()
    {
        $title = 'Data Staff';
        $data = User::where('role', 'staff')->get();
        return view('admin.users.index', compact([
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
        $title = 'Users';
        return view('admin.users.create', compact([
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
        // dd('ok');
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'alamat' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => $request->role,
            'foto' => null,
        ]);

        return redirect()->to('/admin/staff')
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
        $title = 'Users';
        $data = User::where('id', $id)->first();
        return view('admin.users.show', compact([
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
        $title = 'Users';
        $data = User::where('id', $id)->first();
        return view('admin.users.edit', compact([
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
            'nama' => 'required|string',
            'alamat' => 'required',
            'role' => 'required',
        ]);

        User::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'foto' => null,
        ]);

        return redirect()->to('/admin/staff')
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
        User::where('id', $id)->delete();
        return redirect()->to('/admin/user')
                    ->with('success', 'Data berhasil dihapus');
    }
}
