<?php

namespace App\Http\Controllers\Api;

use App\Models\Kasir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KasirController extends Controller
{
    public function index()
    {
        // return response()->json(Kasir::all());
        return response()->json(
            Kasir::with('user')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'=>'required',
            'nama_kasir'=>'required'
        ]);

        return response()->json(Kasir::create($data), 201);
    }

    public function show(Kasir $kasir)
    {
        return response()->json(
            $kasir->load('user')
        );
    }

    public function update(Request $request, Kasir $kasir)
    {
        $kasir->update($request->all());

        return response()->json($kasir);
    }

    public function destroy(Kasir $kasir)
    {
        $kasir->delete();

        return response()->json([
            'message'=>'Kasir deleted'
        ]);
    }
}