<?php

namespace App\Http\Controllers;

use App\Models\Inmuebles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InmueblesController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = DB::table('client_contacts')->where('user_id', auth()->user()->id )->get();

        $datos = DB::table('inmuebles')
        ->where('user_id', auth()->user()->id)
        ->get();

        return view('client.inmueble.index', compact('datos'));
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

        $user = auth()->user()->id;
        $estado = 1;

        $request = request()->all();

        $result = DB::table('inmuebles')->insertGetId([
            'user_id' => $user,
            'estadoTabla' => $estado,
            'calle' => $request['calle'],
            'exterior' => $request['exterior'],
            'interior' => $request['interior'],
            'colonia' => $request['colonia'],
            'ciudad_alcaldia' => $request['ciudad_alcaldia'],
            'estado' => $request['estado'],
            'cp' => $request['cp'],
            'descripcion' => $request['descripcion']
        ]);

        return redirect()->route('client.inmueble.index');

        //required|unique:name table
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inmuebles  $inmuebles
     * @return \Illuminate\Http\Response
     */
    public function show(Inmuebles $inmuebles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inmuebles  $inmuebles
     * @return \Illuminate\Http\Response
     */
    public function edit(Inmuebles $inmuebles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inmuebles  $inmuebles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inmuebles $inmuebles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inmuebles  $inmuebles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inmuebles $inmuebles)
    {
        //
    }
}
