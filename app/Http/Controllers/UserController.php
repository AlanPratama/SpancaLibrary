<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        dd('ini profile');
    }

    public function profileIndex()
    {
        $user = User::where('slug', Auth::user()->slug)->first();

        if (Auth::user()->slug != $user->slug) {
            return redirect()->back();
        } else {
            return view('pages.user.profile', compact('user'));
        }

    }


    public function profileEdit(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $data = $request->validate([
            'username' => 'required',
            'nama'     => 'required',
            'email'      => 'required',
            'telepon'  => 'required',
            'foto'  => '',
            'alamat'  => 'required',
        ]);

        $gambarSebelum = $user->foto;

        if ($request->hasFile('foto')) {
            if ($gambarSebelum) {
                Storage::delete($gambarSebelum);
            }
            $uploadedFile = $request->file('foto');
            $originalName = $uploadedFile->getClientOriginalName();
            $extension = $uploadedFile->getClientOriginalExtension();
        
            // Generate nama file baru berdasarkan nama_tanggal.extension
            $newFileName = $data['username'] . '_' . now()->format('Ymd') . '.' . $extension;
        
            // Simpan file dengan nama baru
            $gambarPath = $uploadedFile->storeAs('users', $newFileName);
            $data['foto'] = $gambarPath;
        }

        // Update attributes
        $user->slug = null;
        $user->update($data);

        return redirect('/setting/'.$request->username)->with('status', 'PROFIL BERHASIL DIPERBARUI');
    }








    public function indexHistori()
    {
        $perizinan = RentLogs::where('user_id', Auth::user()->id)->where('status', 'Butuh Persetujuan')->whereHas('buku')->whereHas('users')->first();
        $dipinjam = RentLogs::where('user_id', Auth::user()->id)->where('status', 'Dipinjam')->whereHas('buku')->whereHas('users')->first();


        return view('/pages.user.historiPeminjaman', compact('perizinan', 'dipinjam'));
        // dd($perizinan);
    }
}
