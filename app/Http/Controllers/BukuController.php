<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $bukus = Buku::all();

        return view('dashboard', ['buku' => $bukus]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'Judul' => 'required',
            'Pengarang' => 'required',
            'Penerbit' => 'required',
        ]);

        // Simpan data ke dalam database
        Buku::create($validatedData);

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Data buku berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) : View
    {
        $buku = Buku::findOrFail($id);
        return view('buku/edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required'
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit
        ]);
        return redirect()->route('buku')->with(['Succes' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) : RedirectResponse
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('bukus')->with(['succes' => 'Data Berhasil Dihapus!']);
    }
}
