<!-- resources/views/peminjaman/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Peminjaman</h1>

    <form method="post" action="{{ route('peminjaman.store') }}">
        @csrf
        <label for="no_peminjaman">No. Peminjaman:</label>
        <input type="text" name="no_peminjaman" required><br>

        <label for="books_id">Books ID:</label>
        <input type="text" name="books_id" required><br>

        <label for="pengunjung_id">Pengunjung ID:</label>
        <input type="text" name="pengunjung_id" required><br>

        <label for="pegawai_id">Pegawai ID:</label>
        <input type="text" name="pegawai_id" required><br>

        <label for="status">Status:</label>
        <input type="text" name="status" required><br>

        <button type="submit">Create Peminjaman</button>
    </form>
@endsection
