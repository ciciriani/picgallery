@extends('auth.layouts')
@section('link_text', 'Dashboard')
@section('link', '/dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h2 class="text-light">Data Foto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('foto.create') }}"> + Tambah Data Foto</a>
            </div>
        </div>
    </div>

    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <section class="gallery">
        <div class="container mt-4">
            <div class="row">
                @foreach ($fotos as $foto)
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100 custom-card">
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
                                <p class="text-secondary">{{ $foto->deskripsi_foto }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <div class="container mt-4">
        <div class="row">
            @foreach ($fotos as $foto)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 custom-card">
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    {!! $fotos->links() !!}


@endsection
