@extends('Auth.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center text-white">
                <h2> Komentar Foto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dashboard') }}"> Kembali</a>
            </div>
        </div>
    </div>
    <br><br>
    <section class="gallery">
        <div class="container ">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        @if ($foto)
                            <img src="/image/{{ $foto->image }}" class="card-img-top" alt="Image">
                            <h5 class="card-title fw-bold text-secondary">{{ $foto->album->nama_album }}</h5>
                            <p class="card-text btn btn-info rounded-pill btn-sm text-white">
                                {{ $foto->judul_foto }}</p>
                            <p class="text-secondary">{{ $foto->deskripsi_foto }}</p>
                            <p class="text-secondary">{{ $foto->tgl_unggah }}</p>
                        @else
                            <p>Tidak ada foto yang ditemukan.</p>
                        @endif
                    </div>

                    @if ($foto)
                        <div class="p-5">
                            <form action="{{ route('comments.simpan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                                <div class="form-group">
                                    <textarea name="isi_komentar" class="form-control" rows="3" placeholder="Komentar Anda"></textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-warning text-white">Kirim Komentar</button>
                            </form>
                        </div>

                        <div class="list-group p-5">
                            @foreach ($foto->comments as $comment)
                                <br>
                                <div class="d-flex flex-start align-items-center">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="https://avatar.iran.liara.run/public/boy?username=Ash" alt="avatar"
                                        width="40" height="40">
                                    <div>
                                        <h6 class="fw-bold text-primary mb-1">
                                            @if ($comment->user)
                                                {{ $comment->user->nama_lengkap }}
                                            @else
                                                [Pengguna Tidak Ditemukan]
                                            @endif
                                        </h6>
                                        {{ $comment->isi_komentar }}
                                        <p class="text-muted small mb-0">
                                            {{ $comment->tgl_komentar }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
