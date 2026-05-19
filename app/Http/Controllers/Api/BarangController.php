<?php

namespace App\Http\Controllers\Api;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json(
            Barang::with('kategori')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang'=>'required',
            'kategori_barang_id'=>'required',
            'harga_beli'=>'required',
            'harga_jual'=>'required',
            'stok'=>'required',
            'satuan'=>'nullable'
        ]);

        return response()->json(Barang::create($data), 201);
    }

    public function show(Barang $barang)
    {
        return response()->json(
            $barang->load('kategori')
        );
    }

    public function update(Request $request, Barang $barang)
    {
        $barang->update($request->all());

        return response()->json($barang);
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return response()->json([
            'message'=>'Barang deleted'
        ]);
    }
}