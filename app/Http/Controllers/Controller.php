<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $fotos = Foto::latest()->paginate(5);
        return view('dashboard', compact('fotos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function lihat($fotoId)
    {
        // Mengambil foto berdasarkan ID
        $foto = Foto::findOrFail($fotoId);

        // Mengambil daftar komentar terkait dengan foto
        $comments = $foto->comments()->paginate(10); // Misalnya, menampilkan 10 komentar per halaman

        // Mengirimkan data foto dan komentar ke tampilan
        return view('show', compact('foto', 'comments'));
    }

    public function simpan(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'isi_komentar' => 'required|string|max:255',
        ]);

        // Membuat instansi objek untuk model Comment
        $comment = new Comment();

        // Menyimpan komentar baru ke dalam database
        $comment->user_id = auth()->id();
        $comment->foto_id = $request->foto_id;
        $comment->isi_komentar = $request->isi_komentar;
        $comment->tgl_komentar = now(); // Tambahkan waktu komentar
        $comment->save();

        return back()->with('success', 'Komentar telah ditambahkan'); // Redirect back or any other response
    }

    public function like(Foto $foto)
    {
        $userId = auth()->id();

        // Periksa apakah pengguna sudah menyukai foto ini sebelumnya
        $existingLike = $foto->likes()->where('user_id', $userId)->first();

        if ($existingLike) {
            // Jika pengguna sudah menyukai foto ini sebelumnya, hapus like tersebut
            $existingLike->delete();
            return back()->with('success', 'Like telah dihapus');
        } else {
            // Jika pengguna belum menyukai foto ini sebelumnya, buat like baru
            $foto->likes()->create([
                'user_id' => $userId,
                'liked_at' => now(),
            ]);

            return back()->with('success', 'Foto telah disukai');
        }
    }
}
