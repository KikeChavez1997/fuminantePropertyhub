<?php

namespace App\Http\Controllers;

use App\Models\ClientContact;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contact = DB::table('client_contacts')
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($contact == null){
            $aux = 0;
        }else{
            $aux = 1; 
        }
        
        $inmuebles = DB::table('inmuebles')
            ->where('user_id', auth()->user()->id)
            ->get();

        
        $reservaciones = DB::table('reservacions')
            ->where('user_id', auth()->user()->id)
            ->get();


        return view('dashboard', compact('aux', 'inmuebles', 'reservaciones'));
    }
}
