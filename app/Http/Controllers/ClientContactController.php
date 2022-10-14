<?php

namespace App\Http\Controllers;

use App\Models\ClientContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = ClientContact::find(auth()->user()->id);

        $user = DB::table('client_contacts')->where('user_id', auth()->user()->id )->get();

        if($user == null){
            $aux = 0;
        }else{
            $aux = 1;
        }

    return view('client.contact.index', compact('user', 'aux'));

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
        $request->validate([
            'apellidos' => 'required',
            'telefono' => 'required'
        ]);
        
        $result = DB::table('client_contacts')->insertGetId([
            'user_id' => auth()->user()->id , 
            'apellidos' => $request['apellidos'],
            'telefono' => $request['telefono'],
        ]);

        return redirect()->route('client.contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientContact  $clientContact
     * @return \Illuminate\Http\Response
     */
    public function show(ClientContact $clientContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientContact  $clientContact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('client_contacts')->where('user_id', $id )->get();

        return view('client.contact.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientContact  $clientContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required'
        ]);

        $user = request()->except(['_token','_method']);
        ClientContact::where('id', $id)->update($user);

        return redirect()->route('client.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientContact  $clientContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientContact $clientContact)
    {
        //
    }
}
