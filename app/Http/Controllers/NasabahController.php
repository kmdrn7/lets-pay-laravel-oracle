<?php

namespace App\Http\Controllers;

use Hash;
use Response;
use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $res = Nasabah::create([
        //     'nama' => 'Andika Ahmad Ramadhan',
        //     'nrp' => '2110171031',
        //     'tgl_lahir' => '1999-02-01',
        //     'alamat' => 'Watutulis, Sekelor Selatan RT.01, RW.05',
        //     'uang' => 0,
        //     'email' => 'aspendaka@gmail.com',
        //     'password_u' => Hash::make('password')
        // ]);

        // $res = Nasabah::where('nama', 'like','%dika%')->first();

        // return response()->json([
        //     'nasabah' => $res
        // ]);
        return "Isok bro nang halaman admin";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function show(Nasabah $nasabah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function edit(Nasabah $nasabah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nasabah $nasabah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nasabah $nasabah)
    {
        //
    }
}
