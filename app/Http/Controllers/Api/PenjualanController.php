<?php

namespace App\Http\Controllers\Api;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{
    public function index()
    {
        return response()->json(
            Penjualan::with(['barang','kasir','diskon'])->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_transaksi'=>'required',
            'barang_id'=>'required',
            'kasir_id'=>'required',
            'jumlah'=>'required',
            'subtotal'=>'required',
            'total'=>'required'
        ]);

        return response()->json(Penjualan::create($data), 201);
    }

    public function show(Penjualan $penjualan)
    {
        return response()->json(
            $penjualan->load(['barang','kasir','diskon'])
        );
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $penjualan->update($request->all());

        return response()->json($penjualan);
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return response()->json([
            'message'=>'Penjualan deleted'
        ]);
    }
}