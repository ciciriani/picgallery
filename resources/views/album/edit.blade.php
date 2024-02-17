@extends('Auth.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-white text-center">
                <h2>Edit Data Album</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info text-white" href="{{ route('album.index') }}"> Kembali</a>
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

    <form action="{{ route('album.update', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row text-white">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Album:</strong>
                    <input type="text" name="nama_album" value="{{ $album->nama_album }}" class="form-control"
                        placeholder="Nama Album">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Deskripsi">{{ $album->deskripsi }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Dibuat:</strong>
                    <input type="date" name="tanggal_dibuat" value="{{ $album->tanggal_dibuat }}" class="form-control"
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
