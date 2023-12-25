<!-- resources/views/peminjaman/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Peminjaman</h1>

    <form method="post" action="{{ route('peminjaman.update', $peminjaman->id) }}">
        @csrf
        @method('PUT')
        <label for="no_peminjaman">No. Peminjaman:</label>
        <input type="text" name="no_peminjaman" value="{{ $peminjaman->no_peminjaman }}" required><br>

        <label for="books_id">Books ID:</label>
        <input type="text" name="books_id" value="{{ $peminjaman->books_id }}" required><br>

        <label for="pengunjung_id">Pengunjung ID:</label>
        <input type="text" name="pengunjung_id" value="{{ $peminjaman->pengunjung_id }}" required><br>

        <label for="pegawai_id">Pegawai ID:</label>
        <input type="text" name="pegawai_id" value="{{ $peminjaman->pegawai_id }}" required><br>

        <label for="status">Status:</label>
        <input type="text" name="status" value="{{ $peminjaman->status }}" required><br>

        <button type="submit">Update Peminjaman</button>
    </form>
@endsection
