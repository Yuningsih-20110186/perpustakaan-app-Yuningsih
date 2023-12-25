@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <h2>Detail peminjaman</h2>

        <div class="card">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>No. Peminjaman:</strong> {{ $peminjaman->no_peminjaman }}</li>
                    <li class="list-group-item"><strong>Books ID:</strong> {{ $peminjaman->books_id }}</li>
                    <li class="list-group-item"><strong>Pengunjung ID:</strong> {{ $peminjaman->pengunjung_id }}</li>
                    <li class="list-group-item"><strong>Pegawai ID:</strong> {{ $peminjaman->pegawai_id }}</li>
                </ul>
            </div>
        </div>

        <a href="{{ route('peminjaman.index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
@endsection
