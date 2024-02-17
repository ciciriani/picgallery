@extends('Auth.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-white text-center">
                <h2>Edit Data Foto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info text-white" href="{{ route('foto.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

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

    <form action="{{ route('foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row text-white">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul Foto:</strong>
                    <input type="text" name="judul_foto" value="{{ $foto->judul_foto }}" class="form-control"
                        placeholder="Judul Foto">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category</strong>
                    <select name="album_id" id="album_id" class="form-select @error('album_id') is-invalid @enderror"
                        aria-label="Default select example">
                        @foreach ($albums as $album)
                            @if ($album->id == $foto->album_id)
                                <option value="{{ $album->id }}" selected>{{ $album->nama_album }}</option>
                            @else
                                <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-2">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi Foto:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi_foto" placeholder="Deskripsi Foto">{{ $foto->deskripsi_foto }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $foto->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Unggah:</strong>
                    <input type="date" name="tgl_unggah" value="{{ $foto->tgl_unggah }}" class="form-control"
                        placeholder="Tanggal Unggah">
                </div>
            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-warning text-white">Submit</button>
        </div>
    </form>
@endsection
