@extends('auth.layouts')
@section('link_text', 'Dashboard')
@section('link', '/dashboard')
@section('link1', '/dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h2 class="text-light">Data Album</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('album.create') }}"> + Tambah Data Album</a>
            </div>
        </div>
    </div>

    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered text-white">
        <tr>
            <th>Nama Album</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($albums as $album)
            <tr>
                <td>{{ $album->nama_album }}</td>
                <td>{{ $album->deskripsi }}</td>
                <td>{{ $album->tanggal_dibuat }}</td>
                <td>
                    <form action="{{ route('album.destroy', $album->id) }}" method="POST">

                        <a class="btn btn-warning text-white" href="{{ route('album.edit', $album->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $albums->links() !!}


@endsection
