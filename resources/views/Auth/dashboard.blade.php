@extends('Auth.layouts')
@section('link_text', ' Data Foto')
@section('link', '/foto')
@section('link1_text', ' Data Album')
@section('link1', '/album')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-15">
            <div class="card-header text-white text-left">
                <h5>Selamat Datang {{ Auth::user()->nama_lengkap }}</h5>

            </div>
        </div>
    </div>
    <br>
    <div class="row">
        @foreach ($fotos as $foto)
            <div class="col-lg-4 mb-4">
                <div class="card h-100 custom-card">
                    <img src="/image/{{ $foto->image }}" class="card-img-top" alt="Image">
                    <div class="card-body bg-light text-center">
                        <p class="card-title fw-bold text-secondary">
                            {{ $foto->judul_foto }}</p>
                        @if ($foto->album)
                            <h5 class="ard-text btn btn-info rounded-pill btn-sm text-white">{{ $foto->album->nama_album }}
                            </h5>
                        @endif
                        <p class="text-secondary">{{ $foto->deskripsi_foto }}</p>
                        <p class="text-secondary">{{ $foto->tgl_unggah }}</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <form action="{{ route('foto.like', $foto->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger me-md-2" type="submit">
                                    <i class="bi bi-suit-heart"></i> {{ $foto->likes()->count() }}
                                </button>
                            </form>
                            <button onclick="window.location='{{ route('comments.lihat', $foto->id) }}'"
                                class="btn btn-info me-md-2" type="button">
                                <i class="bi bi-chat text-light"></i><span style="color: white">
                                    {{ $foto->comments->count() }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
