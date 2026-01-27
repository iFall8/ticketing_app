<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipePembayaran;

class TipePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipePembayarans = TipePembayaran::all();
        return view('pages.admin.tipe-pembayaran.index', compact('tipePembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        if (!isset($payload['nama'])) {
            return redirect()->route('admin.tipe-pembayarans.index')->with('error', 'Nama tipe pembayaran wajib diisi.');
        }

        TipePembayaran::create([
            'nama' => $payload['nama'],
        ]);

        return redirect()->route('admin.tipe-pembayarans.index')->with('success', 'Tipe pembayaran berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        if (!isset($payload['nama'])) {
            return redirect()->route('admin.tipe-pembayarans.index')->with('error', 'Nama tipe pembayaran wajib diisi.');
        }

        $tipePembayaran = TipePembayaran::findOrFail($id);
        $tipePembayaran->nama = $payload['nama'];
        $tipePembayaran->save();

        return redirect()->route('admin.tipe-pembayarans.index')->with('success', 'Tipe pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TipePembayaran::destroy($id);
        return redirect()->route('admin.tipe-pembayarans.index')->with('success', 'Tipe pembayaran berhasil dihapus.');
    }
}

