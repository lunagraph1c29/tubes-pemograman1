<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Tampilkan daftar materi
     */
    public function index(Request $request)
    {
        $query = Materi::where('user_id', auth()->id());

        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $materis = $query->paginate(5);

        return view('materi.index', compact('materis'));
    }

    /**
     * Form tambah materi
     */
    public function create()
    {
        return view('materi.create');
    }

    /**
     * Simpan materi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);

        Materi::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'user_id' => auth()->id()
        ]);

        return redirect('/materi')
            ->with('success', 'Materi berhasil ditambahkan');
    }

    /**
     * Form edit materi
     */
    public function edit($id)
    {
        $materi = Materi::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        return view('materi.edit', compact('materi'));
    }

    /**
     * Update materi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);

        $materi = Materi::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        $materi->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect('/materi')
            ->with('success', 'Materi berhasil diperbarui');
    }

    /**
     * Hapus materi
     */
    public function destroy($id)
    {
        $materi = Materi::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        $materi->delete();

        return redirect('/materi')
            ->with('success', 'Materi berhasil dihapus');
    }
}
