<?php

namespace App\Http\Controllers;

use App\Models\Respon;
use Illuminate\Http\Request;

class ResponController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Respon $respon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($pegadaian_id)
    {
        $pegadaian = Respon::where('pegadaian_id', $pegadaian_id)->first();
        $pegadaianId = $pegadaian_id;
        return view('respon', compact('pegadaian', 'pegadaianId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pegadaian_id)
    {
        
        $request->validate([
            'status' => 'required',
            'pesan'  => 'required',
            'date'   => 'required',
        ]);

        Respon::updateOrCreate(
            [
                'pegadaian_id' => $pegadaian_id,
            ],
            [
                'status' => $request->status,
                'pesan' => $request->pesan,
                'date'   => $request->date,
            ]
        );
        return redirect()->route('data.petugas')->with('responseSuccess', 'Berhasil mengubah response!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Respon $respon)
    {
        //
    }
}
