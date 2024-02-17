<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Comment;
use App\Models\Foto;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fotos = Foto::latest()->get(); // Assuming you want to fetch all fotos
        return view('show', compact('fotos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function store(Request $request)
    // {
    //     // Validasi data yang diterima dari form
    //     $request->validate([
    //         'isi_komentar' => 'required|string|max:255',
    //     ]);

    //     // Membuat instansi objek untuk model Comment
    //     $comment = new Comment();

    //     // Menyimpan komentar baru ke dalam database
    //     $comment->user_id = auth()->id();
    //     $comment->foto_id = $request->foto_id;
    //     $comment->isi_komentar = $request->isi_komentar;
    //     $comment->tgl_komentar = now(); // Tambahkan waktu komentar
    //     $comment->save();

    //     return back()->with('success', 'Komentar telah ditambahkan'); // Redirect back or any other response
    // }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    // public function show(Comment $comment)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
        ]);

        $comment->update([
            'isi_komentar' => $request->isi_komentar,
        ]);

        return redirect()->route('photos.show', $comment->photo_id)->with('success', 'Komentar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('photos.show', $comment->photo_id)->with('success', 'Komentar berhasil dihapus.');
    }
}
