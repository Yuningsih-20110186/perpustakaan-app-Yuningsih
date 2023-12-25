@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>
@endif

<div class="container mt-4">
    <h1>Daftar peminjaman</h1>

    <!-- Search Form -->
    <form action="{{ route('peminjaman.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Data Peminjaman...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">No. Peminjaman</th>
                <th scope="col">Books ID</th>
                <th scope="col">Pengunjung ID</th>
                <th scope="col">Pegawai ID</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
        @foreach($peminjaman as $peminjaman)
           <tr>
               <td>{{ $peminjaman->id }}</td>
               <td>{{ $peminjaman->no_peminjaman }}</td>
               <td>{{ $peminjaman->books_id }}</td>
               <td>{{ $peminjaman->pengunjung_id }}</td>
               <td>{{ $peminjaman->pegawai_id }}</td>
               <td>{{ $peminjaman->status }}</td>
                    <td>
                        <a href="{{ route('peminjaman.show', ['id' => $peminjaman->id]) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('peminjaman.edit', ['id' => $peminjaman->id]) }}" class="btn btn-success">Edit</a>
                        <!-- Delete Form -->
                        <form action="{{ route('peminjaman.delete', ['id' => $peminjaman->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary mt-3">Tambah Peminjaman</a>
</div>
@endsection
