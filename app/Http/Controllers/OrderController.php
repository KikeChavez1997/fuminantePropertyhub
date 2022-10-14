<?php

namespace App\Http\Controllers;

use App\Mail\MercadoPagoMailble;
use App\Mail\NotifiMailble;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;
use App\Mail\EfectivoMailble;


class OrderController extends Controller
{
    public function success(Request $request){

        //Ingresar datos a la tabla de compras

        $order = DB::table('orders')->insertGetId([
            'id_user' => auth()->user()->id,
            'servicio' => session('servicio'),
            'costo' => session('costo'),
            'formaPago' => 'Tarjeta de credito (Mercado pago)',
            'numeroOperacion' => $request['collection_id'],
        ]);

        $historial = DB::table('historials')->insertGetId([
            'user_id' => auth()->user()->id,
            'fecha' => session('fechaResAuth'),
            'hora' => session('horarioAuth'),
            'descripcion' => session('servicio'),
            'monto' => session('costo'),
        ]);

        $data1 = array( //registrar servicio
            'auth' => '$1kbxN4UprP1VwUHGj2GuQOBe/3/nRNP38VulEy.ECc3KIO6QDNf5W$',
            'e_0' => session('idApi'),
            'e_1' => session('fechaResAuth'),
            'e_2' => session('horarioAuth')
         );
         
        $url1 = "https://com-atmx-fuminante.appspot.com/ws/schedule";
     
         $client = new \GuzzleHttp\Client();
         $response = $client->post($url1, [
             'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
             'body'    => json_encode($data1)
         ]); 

        $check = DB::table('client_contacts')->where('user_id', auth()->user()->id)->get();

        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '100860192712099',
            'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
        ]);

        try {

            setlocale(LC_TIME, "spanish");
            $fecha = '2021/11/18';
            $fecha = str_replace("/", "-", session('fechaResAuth') ); 
            $newDate = date("d-m-Y", strtotime(session('fechaResAuth') )); 
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));

            $ex = '52';
            $num = $ex . $check[0]->telefono;

            $hora = session('InvHorarioWhats');
            $nombre = auth()->user()->name;
    

            $men = 'Hola '.$nombre.', su servicio de fumigación esta reservado para el día '. $mesDesc .' a las '. $hora .'. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';  
            $whatsapp_cloud_api->sendTextMessage($num, $men);

        } catch (Exception $e){

        }

        $noty = new NotifiMailble($request);
        $pago = new MercadoPagoMailble($request);
        Mail::to('enrique.chavez.r97@gmail.com')->send($noty); // Notificacion a fuminante
        Mail::to('eduardovtc@fuminante.com')->send($noty);
        Mail::to('karla@fuminante.com')->send($noty); 
        Mail::to(auth()->user()->email)->send($pago);

        session(['successMP' => 'Mercado']);

        return view('client.order.success', compact('request')); 
    }

    public function failure(){
        return view('client.order.failure');
    }

    public function efectivoPay(Request $request){
    //Ingresar datos a la tabla de compras

    $correo = new EfectivoMailble();
    Mail::to(auth()->user()->email)->send($correo);
    Mail::to('eduardovtc@fuminante.com')->send($correo);
    Mail::to('karla@fuminante.com')->send($correo);

    $order = DB::table('orders')->insertGetId([
        'id_user' => auth()->user()->id,
        'servicio' => session('servicio'),
        'costo' => session('costo'),
        'formaPago' => 'Pago en efectivo',
        'numeroOperacion' => 'Pago en efectivo',
    ]);

    $historial = DB::table('historials')->insertGetId([
        'user_id' => auth()->user()->id,
        'fecha' => session('fechaResAuth'),
        'hora' => session('horarioAuth'),
        'descripcion' => session('servicio'),
        'monto' => session('costo'),
    ]);

    $data1 = array( //registrar servicio
        'auth' => '$---$',
        'e_0' => session('idApi'),
        'e_1' => session('fechaResAuth'),
        'e_2' => session('horarioAuth')
     );

    $url1 = "https://com-atmx-fuminante.appspot.com/test/schedule";

    $client = new \GuzzleHttp\Client();
    $response = $client->post($url1, [
        'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
        'body'    => json_encode($data1)
    ]);

    $check = DB::table('client_contacts')->where('user_id', auth()->user()->id)->get();

    $whatsapp_cloud_api = new WhatsAppCloudApi([
        'from_phone_number_id' => '100860192712099',
        'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
    ]);

    try {
        setlocale(LC_TIME, "spanish");
        $fecha = '2021/11/18';
        $fecha = str_replace("/", "-", session('fechaResAuth'));
        $newDate = date("d-m-Y", strtotime(session('fechaResAuth')));
        $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));

        $ex = '52';
        $num = $ex . $check[0]->telefono;

        $hora = session('InvHorarioWhats');
        $nombre = auth()->user()->name;


        $men = 'Hola '.$nombre.', su servicio de fumigación esta reservado para el día '. $mesDesc .' a las '. $hora .'. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';
        $whatsapp_cloud_api->sendTextMessage($num, $men);
    } catch (Exception $e) {
    }

        session(['successMP' => 'Efectivo']);

        return view('client.order.success', compact('request'));
    }

    public function transferenciaPay(Request $request){
        //Ingresar datos a la tabla de compras
    
        $correo = new EfectivoMailble();
        Mail::to(auth()->user()->email)->send($correo);
        Mail::to('eduardovtc@fuminante.com')->send($correo);
        Mail::to('karla@fuminante.com')->send($correo);
    
        $order = DB::table('orders')->insertGetId([
            'id_user' => auth()->user()->id,
            'servicio' => session('servicio'),
            'costo' => session('costo'),
            'formaPago' => 'Pago en efectivo',
            'numeroOperacion' => 'Pago en efectivo',
        ]);
    
        $historial = DB::table('historials')->insertGetId([
            'user_id' => auth()->user()->id,
            'fecha' => session('fechaResAuth'),
            'hora' => session('horarioAuth'),
            'descripcion' => session('servicio'),
            'monto' => session('costo'),
        ]);
    
        $data1 = array( //registrar servicio
            'auth' => '$---$',
            'e_0' => session('idApi'),
            'e_1' => session('fechaResAuth'),
            'e_2' => session('horarioAuth')
         );
    
        $url1 = "https://com-atmx-fuminante.appspot.com/test/schedule";
    
        $client = new \GuzzleHttp\Client();
        $response = $client->post($url1, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => json_encode($data1)
        ]);
    
        $check = DB::table('client_contacts')->where('user_id', auth()->user()->id)->get();
    
        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '100860192712099',
            'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
        ]);
    
        try {
            setlocale(LC_TIME, "spanish");
            $fecha = '2021/11/18';
            $fecha = str_replace("/", "-", session('fechaResAuth'));
            $newDate = date("d-m-Y", strtotime(session('fechaResAuth')));
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));
    
            $ex = '52';
            $num = $ex . $check[0]->telefono;
    
            $hora = session('InvHorarioWhats');
            $nombre = auth()->user()->name;
    
    
            $men = 'Hola '.$nombre.', su servicio de fumigación esta reservado para el día '. $mesDesc .' a las '. $hora .'. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';
            $whatsapp_cloud_api->sendTextMessage($num, $men);
        } catch (Exception $e) {
        }
    
        session(['successMP' => 'Transferencia']);

            return view('client.order.success', compact('request'));
        }

    public function pending(){
        return view('client.order.pending');
    }
}
