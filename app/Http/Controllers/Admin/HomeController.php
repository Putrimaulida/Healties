<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Ruang;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $pasien_dirawat = Pasien::where('status', 'treated')->count();
        $pasien_selesai = Pasien::where('status', 'done')->count();
        $dokter = Dokter::count();
        $ruangan = Ruang::count();
        return view('admin.home.index', compact([
            'title', 'pasien_dirawat', 'pasien_selesai', 'dokter', 'ruangan'
        ]));
    }

    public function ubah_password(){
        $title = 'Ubah Password';
        return view('admin.home.ubah_password', compact([
            'title'
        ]));
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password|min:6'
        ]);
        
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('/admin/ubah_password')->with('success', 'Password successfully changed');
    }

    public function ubah_profile(){
        $title = 'Ubah Profile';
        return view('admin.home.ubah_profile', compact([
            'title'
        ]));
    }

    public function update_profile(Request $request){
        // ddd($request->all());
        $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image_name = null;
        if(auth()->user()->foto && file_exists(storage_path('app/public/'. auth()->user()->foto))){
            Storage::delete(['public/', auth()->user()->foto]);
        }
        
        if($request->foto != null){
            $image_name = $request->file('foto')->store('profile', 'public');
        }

        User::where('id', auth()->user()->id)
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'foto' => ($image_name == null) ? auth()->user()->foto : $image_name
            ]);
        
        return redirect()->to('/admin/ubah_profile')
                         ->with('success', 'Profile successfully changed at '. Carbon::now());
    }
}
