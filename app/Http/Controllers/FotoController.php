<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = Foto::latest()->where('user_id', auth()->id())->paginate(100);

        return view('foto.index', compact('fotos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fotos = Album::all();
        return view('foto.create', compact('fotos'));
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
            'judul_foto' => 'required',
            'album_id' => 'required|exists:albums,id',
            'user_id' => 'required|exists:users,id',
            'deskripsi_foto' => 'required',
            'tgl_unggah' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Foto::create($input);

        return redirect()->route('foto.index')
            ->with('success', 'Foto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        return view('foto.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        $albums = Album::all(); // Ambil semua album
        return view('foto.edit', ['foto' => $foto, 'albums' => $albums]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {

        $request->validate([
            'judul_foto' => 'required',
            'album_id' => 'required|exists:albums,id',
            'user_id' => 'required|exists:users,id',
            'deskripsi_foto' => 'required',
            'tgl_unggah' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $foto->update($input);

        return redirect()->route('foto.index')
            ->with('success', 'Foto updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        $foto->delete();

        return redirect()->route('foto.index')
            ->with('success', 'Foto deleted successfully');
    }
}
