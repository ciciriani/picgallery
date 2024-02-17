@extends('Auth.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center text-white">
                <h2>Lihat Foto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('foto.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
    <section class="gallery">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 custom-card text-center">
                        <a href="foto/{{ $foto->id }}">
                            <img src="/image/{{ $foto->image }}" class="card-img-top" alt="Image">
                        </a>
                        <div class="card-body bg-light text-center">
                            <p class="card-title fw-bold text-secondary">
                                {{ $foto->judul_foto }}</p>
                            @if ($foto->album)
                                <h5 class="card-text btn btn-info rounded-pill btn-sm text-white">
                                    {{ $foto->album->nama_album }}</h5>
                            @endif

                            {{-- <h5 class="card-text btn btn-info rounded-pill btn-sm text-white">{{ $foto->album->nama_album }}
                            </h5> --}}
                            <p class="text-secondary">{{ $foto->deskripsi_foto }}</p>
                            <p class="text-secondary">{{ $foto->tgl_unggah }}</p>
                            <form action="{{ route('foto.destroy', $foto->id) }}" class="text-center" method="POST">

                                <a class="btn btn-warning text-white" href="{{ route('foto.edit', $foto->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 custom-card ">
                    <!-- Added custom-card class -->
                    <a href="foto/{{ $foto->id }}">
                        <img src="/image/{{ $foto->image }}" class="card-img-top" alt="Image"
                            style="height: 250px; object-fit: cover;">
                    </a>
                    <div class="card-body text-center" style="background-color: #FFF7F1;">
                        <h5 class="card-title fw-bold text-secondary">{{ $foto->category }}</h5>
                        <p class="card-text btn btn-info rounded-pill btn-sm text-white">
                            {{ $foto->judul_foto }}</p>
                        <p class="text-secondary">{{ $foto->deskripsi_foto }}</p>
                        <p class="text-secondary">{{ $foto->tgl_unggah }}</p>
                        <form action="{{ route('foto.destroy', $foto->id) }}" class="text-center" method="POST">

                            <a class="btn btn-warning text-white" href="{{ route('foto.edit', $foto->id) }}">Update</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{--
    <div class="col-lg-3 mx-auto">
        <div class="card" style="width: 20rem;">
            <img src="/image/{{ $foto->image }}" class="card-img-top">
            <div class="card-body" style="background-color: #FFFFDD;">
                <h5 class="card-title fw-bold text-secondary">{{ $foto->category }}</h5>
                <p class="card-text btn btn-info rounded-pill btn-sm text-white">
                    {{ $foto->judul_foto }}</p>
                <p class="text-secondary">{{ $foto->deskripsi_foto }}</p>
                <p class="text-secondary">{{ $foto->tgl_unggah }}</p>

                <form action="{{ route('foto.destroy', $foto->id) }}" class="text-center" method="POST">

                    <a class="btn btn-warning text-white" href="{{ route('foto.edit', $foto->id) }}">Update</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
