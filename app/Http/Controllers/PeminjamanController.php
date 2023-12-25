<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanT;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $peminjaman = PeminjamanT::all();

        $search = $request->input('search');
        $peminjaman = PeminjamanT::when($search, function ($query) use ($search) {
        return $query->where('no_peminjaman', 'like', '%' . $search . '%');
    })->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id',
            'no_peminjaman' => 'required|string|max:255',
            'books_id' => 'required|string|max:255',
            'pengunjung_id' => 'required|string|max:255',
            'pegawai_id' => 'required|string|max:255',
            'status' => 'required|string|max:255',

        ]);

        PeminjamanT::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $peminjaman = PeminjamanT::find($id);
        if (!$peminjaman) {}
        return view('peminjaman.show', ['peminjaman' => $peminjaman]);
    }

    public function edit($id)
    {
        $peminjaman = PeminjamanT::find($id);
        return view('peminjaman.edit', ['peminjaman' => $peminjaman]);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = PeminjamanT::findOrFail($id);
        $request->validate([
            'no_peminjaman' => 'required|string|max:255',
            'books_id' => 'required|string|max:255',
            'pengunjung_id' => 'required|string|max:255',
            'pegawai_id' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $peminjaman = PeminjamanT::find($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman Berhasil Dihapus');
    }
}
