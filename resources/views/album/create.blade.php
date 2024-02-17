@extends('Auth.layouts')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center text-white">
                <h2>Tambah Data Album</h2>
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

    <form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-white">
                    <strong>Nama Album:</strong>
                    <input type="text" name="nama_album" class="form-control" placeholder="Nama Album">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-white">
                    <strong>Deskripsi:</strong>
                    <input class="form-control" type="text" style="height:150px" name="deskripsi"
                        placeholder="Deskripsi"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-white">
                    <strong>Tanggal Dibuat:</strong>
                    <input type="date" name="tanggal_dibuat" class="form-control" placeholder="Tanggal Dibuat">
                </div>
            </div>

            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-warning text-white">Submit</button>
        </div>
    </form>
@endsection
