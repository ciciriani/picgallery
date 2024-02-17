<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('id', 'desc')->paginate(5);
        return view('album.index', compact('albums'));
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_album' => 'required',
            'deskripsi' => 'required',
            'tanggal_dibuat' => 'required',
        ]);

        Album::create($request->post());

        return redirect()->route('album.index')->with('success', 'Album created successfully.');
    }

    public function edit(Album $album)
    {
        return view('album.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'nama_album' => 'required',
            'deskripsi' => 'required',
            'tanggal_dibuat' => 'required',
        ]);

        $album->fill($request->post())->save();

        return redirect()->route('album.index')->with('success', 'Album updated successfully');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('album.index')->with('success', 'Album deleted successfully');
    }
}
