@extends('Auth.layouts')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center text-white">
                <h2>Tambah Data Foto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info text-white" href="{{ route('foto.index') }}">Kembali</a>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-white">
                    <strong>Judul Foto:</strong>
                    <input type="text" name="judul_foto" class="form-control" placeholder="Judul Foto">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-white">
                    <label for="kategori"><strong>Kategori:</strong></label>
                    <select name="album_id" id="album_id" class="form-select @error('album_id') is-invalid @enderror"
                        aria-label="Default select example">
                        <option selected>Pilih nama Album</option>
                        @foreach ($fotos as $album)
                            <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-2">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-white">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi_foto" placeholder="Deskripsi"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-white">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-white">
                    <strong>Tanggal Unggah:</strong>
                    <input type="date" name="tgl_unggah" class="form-control" placeholder="Tanggal Unggah">
                </div>
            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-warning text-white">Submit</button>
        </div>
    </form>
@endsection
