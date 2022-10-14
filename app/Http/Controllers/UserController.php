<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\PassMailble;
use Illuminate\Support\Facades\Mail;

use Exception;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;

class UserController extends Controller
{
    
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function stor(Request $request){

        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '100860192712099',
            'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
        ]);

        try {
            $ex = '52';
            $num = $ex . $request['TeléfonoCelular'];

            //$men = 'Hola '.$nombre.', su servicio de fumigación esta reservado para el día '. $fecha .' a las '. $hora .'. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';  

            $whatsapp_cloud_api->sendTemplate( $num, 'bienvenida', 'es_Mx' ); // Language is optional
            
        } catch (Exception $e){

        } 

        $request->validate([
            'NombreCompleto' => 'required',
            'TeléfonoCelular' => 'required|max:10',
            'email' => 'required|unique:users',
        ]);

        $sinhash = '8dw!4SbCU9H89s8H$';
        $password = Hash::make($sinhash);

        //return $password;

        session(['NombreCompleto' => $request['NombreCompleto']]);
        session(['TelefonoCelular' => $request['TeléfonoCelular']]);
        session(['email' => $request['email']]);
        session(['Pass' => $sinhash]);

        $user = DB::table('users')->insertGetId([
            'name' => $request['NombreCompleto'],
            'email' => $request['email'],
            'password' => $password,
        ]);

        $contact = DB::table('client_contacts')->insertGetId([
            'user_id' => $user,
            'clientIdApi' => '',
            'apellidos' => $request['NombreCompleto'],
            'telefono' => $request['TeléfonoCelular'],
        ]);
 

        if (Auth::attempt(['email' => $request['email'], 'password' => $sinhash])) {
            // Authentication passed...

            $datos = new PassMailble;
            Mail::to($request['email'])->send($datos);

            return redirect()->intended('home');
        }

        //return $request;


    }
}
