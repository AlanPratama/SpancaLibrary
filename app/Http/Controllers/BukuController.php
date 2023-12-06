<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class BukuController extends Controller
{

    public function index(Request $request)
    {
        $bukus = Buku::all();
        return view('pages.admin.dBuku', compact('bukus'));
    }

    public function index_user(Request $request)
    {
        $bukus = Buku::all();
        $novels = Buku::where('kategori', 'Novel')->get();
        $mangas = Buku::where('kategori', 'Manga')->get();
        $studys = Buku::where('kategori', 'Study')->get();

        $terpopuler = Buku::orderBy('total_pinjam', 'desc')->paginate(6);
        return view('pages.bukuUser', compact('novels', 'mangas', 'studys', 'bukus', 'terpopuler'));
    }



    public function create()
    {
        return view('pages.admin.tambahBuku');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'pengarang' => 'required',
            'penerbit'  => 'required',
            'halaman'   => 'required',
            'deskripsi' => 'required',
            'tahun_terbit'  => 'required',
            'jumlah_buku'   => 'required',
            'gambar'    => 'required',
            'kategori'  =>  'required',
            'genre' => 'required',
            'link_ebook' => ''
        ]);

        if ($request->hasFile('gambar')) {
            $uploadedFile = $request->file('gambar');
            $originalName = $uploadedFile->getClientOriginalName();
            $extension = $uploadedFile->getClientOriginalExtension();

            $newFileName = $data['nama'] . '_' . now()->format('Ymd') . '.' . $extension;

            $gambarPath = $uploadedFile->storeAs('images', $newFileName);
            $data['gambar'] = $gambarPath;
        }


        Buku::create($data);

        return redirect('tambah-buku')->with('status', 'BERHASIL MENAMBAH BUKU');
    }

    // ADMIN ADMIN ADMIN ADMIN ADMIN
    public function show($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        if ($buku) {
            return view('pages.admin.detailBuku', compact('buku'));
        } else {
            return redirect()->back();
        }
    }

    public function destroy($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        $rents = RentLogs::where('buku_id', $buku->id)->get();
        $users = User::where('buku_id', $buku->id)->get();

        if ($users) {
            foreach ($users as $user) {
                $user->buku_id = null;
                $user->save();
            }
        }

        if ($rents) {
            foreach ($rents as $rent) {
                $rent->delete();
            }
        }

        $gambarPath = $buku->gambar;
        $buku->delete();
        if ($gambarPath) {
            Storage::delete($gambarPath);
        }

        return redirect()->route('dBuku.index')->with('status', 'BUKU BERHASIL DIHAPUS');
    }

    public function edit($slug)
    {
        $buku = Buku::where('slug', $slug)->first();
        return view('pages.admin.editBuku', compact('buku'));
    }

    public function update(Request $request, $slug)
    {
        $buku = Buku::where('slug', $slug)->first();

        $data = $request->validate([
            'nama' => 'required',
            'pengarang'     => 'required',
            'penerbit'      => 'required',
            'deskripsi'     => '',
            'tahun_terbit'  => 'required',
            'halaman'       => 'required',
            'jumlah_buku'   => 'required',
            'gambar'        => '',
            'kategori'      => 'required',
            'genre'         => 'required',
            'link_ebook'    => ''
        ]);

        $gambarSebelum = $buku->gambar;

        if ($request->hasFile('gambar')) {
            if ($gambarSebelum) {
                Storage::delete($gambarSebelum);
            }
            $uploadedFile = $request->file('gambar');
            $originalName = $uploadedFile->getClientOriginalName();
            $extension = $uploadedFile->getClientOriginalExtension();

            $newFileName = $data['nama'] . '_' . now()->format('Ymd') . '.' . $extension;

            $gambarPath = $uploadedFile->storeAs('images', $newFileName);
            $data['gambar'] = $gambarPath;
        }

        // Update attributes
        $buku->slug = null;
        $buku->update($data);

        return redirect()->route('dBuku.index')->with('status', 'BUKU TELAH DIPERBARUI.');
    }




    // USER USER USER USER USER
    public function detail($slug)
    {
        $buku = Buku::where('slug', $slug)->first();

        if ($buku) {
            return view('pages.detailBuku_User', compact('buku'));
        } else {
            return redirect()->back();
        }
    }

    // public function kategori($kategori)
    // {
    //     $buku = Buku::where('kategori', ($kategori))->get();
    //     return view('pages.kategori', compact('buku'));
    // }

    public function novel(Request $request)
    {
        $novels = Buku::where('kategori', 'Novel')->get();

        return view('pages.kategoriNovel_User', compact('novels'));
    }

    public function manga(Request $request)
    {
        $mangas = Buku::where('kategori', 'Manga')->get();

        return view('pages.kategoriManga_User', compact('mangas'));
    }

    public function study(Request $request)
    {
        $studys = Buku::where('kategori', 'Novel')->get();

        return view('pages.kategoriStudy_User', compact('studys'));
    }
}
