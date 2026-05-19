<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    // GET ALL
    public function index()
    {
        $penjualan = Penjualan::with([
            'barang',
            'kasir',
            'diskon'
        ])->get();

        return response()->json([
            'success' => true,
            'message' => 'Data penjualan berhasil diambil',
            'data' => $penjualan
        ], 200);
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_transaksi' => 'required',
            'barang_id' => 'required',
            'kasir_id' => 'required',
            'jumlah' => 'required',
            'subtotal' => 'required',
            'total' => 'required'
        ]);

        $penjualan = Penjualan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data penjualan berhasil ditambahkan',
            'data' => $penjualan
        ], 201);
    }

    // SHOW DETAIL
    public function show($id)
    {
        $penjualan = Penjualan::with([
            'barang',
            'kasir',
            'diskon'
        ])->find($id);

        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Data penjualan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data penjualan',
            'data' => $penjualan
        ], 200);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Data penjualan tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'kode_transaksi' => 'required',
            'barang_id' => 'required',
            'kasir_id' => 'required',
            'jumlah' => 'required',
            'subtotal' => 'required',
            'total' => 'required'
        ]);

        $penjualan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data penjualan berhasil diupdate',
            'data' => $penjualan
        ], 200);
    }

    // DELETE
    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);

        if (!$penjualan) {
            return response()->json([
                'success' => false,
                'message' => 'Data penjualan tidak ditemukan'
            ], 404);
        }

        $penjualan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data penjualan berhasil dihapus'
        ], 200);
    }
}