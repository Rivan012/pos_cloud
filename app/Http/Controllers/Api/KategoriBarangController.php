<?php

namespace App\Http\Controllers\Api;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriBarangController extends Controller
{
    public function index()
    {
        return response()->json(KategoriBarang::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_kategori'=>'required',
            'deskripsi'=>'nullable'
        ]);

        return response()->json(KategoriBarang::create($data), 201);
    }

    public function show(KategoriBarang $kategoriBarang)
    {
        return response()->json($kategoriBarang);
    }

    public function update(Request $request, KategoriBarang $kategoriBarang)
    {
        $kategoriBarang->update($request->all());

        return response()->json($kategoriBarang);
    }

    public function destroy(KategoriBarang $kategoriBarang)
    {
        $kategoriBarang->delete();

        return response()->json([
            'message'=>'Kategori deleted'
        ]);
    }
}