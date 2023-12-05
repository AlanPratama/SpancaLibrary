<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dUser()
    {
        $users = User::orderByRaw('FIELD(role_id, 1, 2)')->get(); // Mengambil semua data pengguna
        return view('pages.admin.dUser', compact('users'));
    }

    public function editUser($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('pages.admin.user.editUser', compact('user'));
    }

    public function editUserProcess(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $data = $request->validate([
            'username' => 'required|min:6|unique:users,username,'.$user->id,
            'nama'     => 'required',
            'email'      => 'required|unique:users,email,'.$user->id,
            'telepon'  => 'required|min:8|unique:users,telepon,'.$user->id,
            'foto'  => '',
            'alamat'  => 'required',
        ]);

        $gambarSebelum = $user->foto;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

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
            $path = $gambarPath;
        }

        // Update attributes
        $user->username = $request->username;
        $user->nama = $request-> nama;
        $user->email = $request-> email;
        $user->telepon = $request-> telepon;
        $user->alamat = $request-> alamat;
        $user->role_id = $request-> role_id;
        $user->foto = $path;

        $user->slug = null;
        $user->update();

        return redirect('/daftar-user')->with('status', 'AKUN USER BERHASIL DIPERBARUI');
    }


    public function deleteUser(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();
        $rent = RentLogs::where('user_id', $user->id)->get();
        
        if ($rent->count() > 0) {
            foreach ($rent as $item) {
                $item->delete();
            }
        }
        $user->delete();
        
        return redirect('/daftar-user')->with('status', 'USER BERHASIL DIHAPUS');
        // return response()->json([
        //     'status' => 200,
        //     'message' => 'BERHASIL'
        // ]);
    }
















    public function profile()
    {
        dd('ini profile');
    }

    public function profileIndex($slug)
    {
        $user = User::where('slug', Auth::user()->slug)->first();
        $pinjamCount = RentLogs::where('user_id', $user->id)->where('status', 'Dikembalikan')->count();
        $pelanggaranCount = RentLogs::where('user_id', $user->id)->where('denda', '!=', null) ->count();

        if ($slug != $user->slug) {
            return redirect()->back();
        } else {
            return view('pages.user.profile', compact('user', 'pinjamCount', 'pelanggaranCount'));
        }
    }


    public function profileEdit(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $data = $request->validate([
            'username' => 'required|min:6|unique:users,username,'.$user->id,
            'nama'     => 'required',
            'email'      => 'required|unique:users,email,'.$user->id,
            'telepon'  => 'required|min:8|unique:users,telepon,'.$user->id,
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

        return redirect('/setting/' . $request->username)->with('status', 'PROFIL BERHASIL DIPERBARUI');
    }








    public function indexHistori()
    {
        $perizinan = RentLogs::where('user_id', Auth::user()->id)->where('status', 'Butuh Persetujuan')->whereHas('buku')->whereHas('users')->first();
        $dipinjam = RentLogs::where('user_id', Auth::user()->id)->where('status', 'Dipinjam')->whereHas('buku')->whereHas('users')->first();

        $rent = RentLogs::where('user_id', Auth::user()->id)
            ->where('status', 'Dikembalikan')
            ->where('hari_terlambat', null)
            ->where('denda', null)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.user.historiPeminjaman', compact('perizinan', 'dipinjam', 'rent'));
        // dd($perizinan);
    }

    public function indexPelanggaran()
    {
        $terlambat = RentLogs::where('user_id', Auth::user()->id)->where('status', 'Terlambat')->whereHas('buku')->whereHas('users')->first();


        $pelanggaran = RentLogs::where('user_id', Auth::user()->id)
            ->where('denda', '!=', null)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('/pages.user.historiPelanggaran', compact('pelanggaran', 'terlambat'));
        // dd($perizinan);
    }
}
