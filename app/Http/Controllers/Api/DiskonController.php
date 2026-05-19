<?php

namespace App\Http\Controllers\Api;

use App\Models\Diskon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiskonController extends Controller
{
    public function index()
    {
        return response()->json(Diskon::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_diskon'=>'required',
            'jenis_diskon'=>'required',
            'nilai_diskon'=>'required'
        ]);

        return response()->json(Diskon::create($data), 201);
    }

    public function show(Diskon $diskon)
    {
        return response()->json($diskon);
    }

    public function update(Request $request, Diskon $diskon)
    {
        $diskon->update($request->all());

        return response()->json($diskon);
    }

    public function destroy(Diskon $diskon)
    {
        $diskon->delete();

        return response()->json([
            'message'=>'Diskon deleted'
        ]);
    }
}