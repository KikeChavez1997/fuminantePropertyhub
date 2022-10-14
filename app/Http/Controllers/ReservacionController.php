<?php

namespace App\Http\Controllers;

use App\Mail\CoberturaFuminanteMailble;
use App\Models\reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Mail\CoberturaMailble;
use App\Mail\EfectivoMailble;
use App\Mail\SuperficieFumMailble;
use App\Mail\SuperficieMailble;
use App\Mail\TransferenciaMailble;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Model\inmuebles;
use Exception;
use Illuminate\Support\Str;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi; 


class ReservacionController extends Controller
{


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function rapido(Request $request){
        $request->all();

        session(['TipoPagoRapido' => $request['tipoPago']]);

        return view('client.reservacion.pagoRapido');

    }

    public function store(Request $request)
    {
        $request->all();
        
        $inmueble = DB::table('inmuebles')->insertGetId([
            'user_id' => auth()->user()->id,
            'estadoTabla' => 1,
            'calle' => $request['calle'],
            'exterior' => $request['numero_exterior'],
            'interior' => $request['numero_interior'],
            'colonia' => $request['colonia'],
            'ciudad_alcaldia' => $request['alcaldia'],
            'estado' => 'Ciudad de Mexico',
            'cp' => $request['codigo_postal'],
            'descripcion' => $request['calle'],
        ]);

        session(['alcaldiaAuth' => $request['alcaldia'],]);

        $id_res = DB::table('reservacions')->insertGetId([
            'user_id' => auth()->user()->id,
            'inmueble_id' => $inmueble,
            'nombre_empresa' => $request['nombre_negocio'],
            'rfc' => $request['rfc'],
            'servicio' => $request['servicio'],
            'tipoServicio' => $request['tipoServicio'],
            'codigo_postal' => $request['codigo_postal'],
            'superficie' => $request['superficial'],
            'periodicidad' => $request['periodicidad'],
            'costo' => $request['costo']
        ]);

        session(['servicio' => $request['tipoServicio']]);
        session(['pago' => 'Efectivo']);
        session(['costo' => $request['costo']]);
        session(['inmueble' => $inmueble]);
        session(['reservacion' => $id_res]);

        if(session('pago') == 'transferencia'){

            $correo = new TransferenciaMailble;
            Mail::to(auth()->user()->email)->send($correo);
            Mail::to('eduardovtc@fuminante.com')->send($correo);
            Mail::to('karla@fuminante.com')->send($correo); 

        }elseif(session('pago') == 'efectivo'){

            $correo = new EfectivoMailble;
            Mail::to(auth()->user()->email)->send($correo);
            Mail::to('eduardovtc@fuminante.com')->send($correo);
            Mail::to('karla@fuminante.com')->send($correo); 
        }

        //Codigo API para ingresar datos

        $data = array(
            'auth' => '$---$',
            'e_0' => auth()->user()->name,
            'e_1' => 'MC-113',
            'e_2' => $request['calle'],
            'e_3' => $request['numero_exterior'],
            'e_4' => $request['numero_interior'],
            'e_5' => $request['colonia'],
            'e_6' => $request['alcaldia'],
            'e_7' => 'Ciudad de México',
            'e_8' => $request['codigo_postal'],
            'e_9' => $request['tipoServicio'],
            'e_10' => $request['superficial'],
            'e_11' => $request['periodicidad'],
            'e_12' => 'Efectivo'
         );

        return $data;

        $url = "https://com-atmx-fuminante.appspot.com/test/client";
         
         $client = new \GuzzleHttp\Client();
         $response = $client->post($url, [
             'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
             'body'    => json_encode($data)
         ]); 

         $aux = json_decode($response->getBody()->getContents() );
         //return $aux->client_id;

        

         $dat = DB::table('inmuebles')
            ->where('user_id', auth()->user()->id)
            ->update(['clientIdApi' => $aux->client_id]);

        $dat2 = DB::table('reservacions')
            ->where('user_id', auth()->user()->id)
            ->update(['clientIdApi' => $aux->client_id]);

        $dat3 = DB::table('client_contacts')
            ->where('user_id', auth()->user()->id)
            ->update(['clientIdApi' => $aux->client_id]);

        $contact = DB::table('client_contacts')->where('user_id', auth()->user()->id)->first();
            
            $data2 = array( //Datos de contacto
                'auth' => '$---$',
                'e_0' => $aux->client_id,
                'e_1' => auth()->user()->name,
                'e_2' => $contact->apellidos,
                'e_3' => $contact->telefono,
                'e_4' => auth()->user()->email
             );
             
            //return $data2;

            $url2 = "https://com-atmx-fuminante.appspot.com/test/contact";
         
             $client = new \GuzzleHttp\Client();
             $response = $client->post($url2, [
                 'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
                 'body'    => json_encode($data2)
             ]);
             
             session(['idApi' => $aux->client_id]);
             session(['apellidosAuth' => $contact->apellidos]);
             session(['telAuth' => $contact->telefono]);

        //return redirect()->route('filtertree');

        return view('client.reservacion.calendarizar');

    }

    public function fecha(Request $request){

        $request->all();

        session(['fechaResAuth' => $request['fechaRes']]);

        //$datos = DB::table('inv_historials')->where('fecha', $request['fechaRes'])->get();

        $hora1 = DB::table('historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '9:00']
        ])->exists();

        $hora2 = DB::table('historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '10:30']
        ])->exists();

        $hora3 = DB::table('historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '12:00']
        ])->exists();

        $hora4 = DB::table('historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '13:30']
        ])->exists();

        $hora5 = DB::table('historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '16:00']
        ])->exists();

        $hora6 = DB::table('historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '17:30']
        ])->exists();

        //return $hora2;

        return view('client.reservacion.horario', compact('hora1', 'hora2', 'hora3', 'hora4','hora5','hora6'));

    }

    public function horario(Request $request){

        /*

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

        */
        
         $request->all();

        session(['horarioAuth' => $request['InvHorario']]);

        if($request['InvHorario'] == '9:00'){
            session(['InvHorarioWhats' => '9:00 am']);

        }else if($request['InvHorario'] == '10:30'){
            session(['InvHorarioWhats' => '10:30 am']);

        }else if($request['InvHorario'] == '12:00'){
            session(['InvHorarioWhats' => '12:00 pm']);

        }else if($request['InvHorario'] == '13:30'){
            session(['InvHorarioWhats' => '13:30 pm']);

        }else if($request['InvHorario'] == '16:00'){
            session(['InvHorarioWhats' => '16:00 pm']);

        }else if($request['InvHorario'] == '17:30'){
            session(['InvHorarioWhats' => '17:30 pm']);
        }

        return redirect()->route('filtertree');

    }

    public function show(reservacion $reservacion)
    {
        //
    }

    public function edit(reservacion $reservacion)
    {
        //
    }

    public function update(Request $request, reservacion $reservacion)
    {
        //
    }

    public function destroy(reservacion $reservacion)
    {
        //
    }

    public function filterone(){
        $contact = DB::table('client_contacts')->where('user_id', auth()->user()->id)->first();

        return view('client.reservacion.filterone', compact('contact'));
    }

    public function filtertwo(Request $request){

        $request->validate([
            'codigo_postal' => 'required|max:5',
            'superficie' => 'required|max:6'
        ]);

        $request = $request->all();

        $array = [
            '01900' => null, 
            '01904' => null,
            '01260' => null,
            '01269' => null,
            '01270' => null,
            '01275' => null,
            '01276' => null,
            '01278' => null,
            '01279' => null,
            '01280' => null,
            '01285' => null,
            '01289' => null,
            '01290' => null,
            '01296' => null,
            '01298' => null,
            '01299' => null,
            '01310' => null,
            '01320' => null,
            '01330' => null,
            '01340' => null,
            '01376' => null,
            '01377' => null,
            '01000' => null,
            '01010' => null,
            '01020' => null,
            '01030' => null,
            '01040' => null,
            '01049' => null,
            '01050' => null,
            '01060' => null,
            '01070' => null,
            '01080' => null,
            '01089' => null,
            '01090' => null,
            '01120' => null,
            '01125' => null,
            '01130' => null,
            '01139' => null,
            '01140' => null,
            '01150' => null,
            '01160' => null,
            '01180' => null,
            '01200' => null,
            '01210' => null,
            '01219' => null,
            '01220' => null,
            '01619' => null,
            '01620' => null,
            '01630' => null,
            '01640' => null,
            '01645' => null,
            '01650' => null,
            '01700' => null,
            '01708' => null,
            '01710' => null,
            '01720' => null,
            '01730' => null,
            '01740' => null,
            '01750' => null,
            '01759' => null,
            '01760' => null,
            '01770' => null,
            '01780' => null,
            '01789' => null,
            '01790' => null,
            '01800' => null,
            '01807' => null,
            '01810' => null,
            '01820' => null,
            '01840' => null,
            '01389' => null,
            '01400' => null,
            '01408' => null,
            '01430' => null,
            '01450' => null,
            '01470' => null,
            '01480' => null,
            '01490' => null,
            '01500' => null,
            '01510' => null,
            '01588' => null,
            '01590' => null,
            '01600' => null,
            '01610' => null,
            '01618' => null,
            '03103' => null,
            '03104' => null,
            '03200' => null,
            '03230' => null,
            '03240' => null,
            '03300' => null,
            '03303' => null,
            '03310' => null,
            '03320' => null,
            '03330' => null,
            '03340' => null,
            '03400' => null,
            '03410' => null,
            '03420' => null,
            '03430' => null,
            '03440' => null,
            '03540' => null,
            '03600' => null,
            '03610' => null,
            '03650' => null,
            '03710' => null,
            '03720' => null,
            '03730' => null,
            '03740' => null,
            '03800' => null,
            '03810' => null,
            '03820' => null,
            '03840' => null,
            '03900' => null,
            '03910' => null,
            '03920' => null,
            '03930' => null,
            '03940' => null,
            '03000' => null,
            '03010' => null,
            '03020' => null,
            '03023' => null,
            '03100' => null,
            '04000' => null,
            '04010' => null,
            '04020' => null,
            '04030' => null,
            '04640' => null,
            '04650' => null,
            '04660' => null,
            '04700' => null,
            '04710' => null,
            '04730' => null,
            '04739' => null,
            '04800' => null,
            '04810' => null,
            '04815' => null,
            '04830' => null,
            '04840' => null,
            '04870' => null,
            '04890' => null,
            '04899' => null,
            '04909' => null,
            '04910' => null,
            '04918' => null,
            '04919' => null,
            '04920' => null,
            '04929' => null,
            '04930' => null,
            '04938' => null,
            '04939' => null,
            '04940' => null,
            '04950' => null,
            '04960' => null,
            '04970' => null,
            '04980' => null,
            '04040' => null,
            '04100' => null,
            '04120' => null,
            '04200' => null,
            '04210' => null,
            '04230' => null,
            '04250' => null,
            '04310' => null,
            '04320' => null,
            '04340' => null,
            '04360' => null,
            '04369' => null,
            '04420' => null,
            '04500' => null,
            '04519' => null,
            '04600' => null,
            '05320' => null,
            '05330' => null,
            '05348' => null,
            '05360' => null,
            '05370' => null,
            '05379' => null,
            '05500' => null,
            '05100' => null,
            '05110' => null,
            '05120' => null,
            '05129' => null,
            '10000' => null,
            '10200' => null,
            '10300' => null,
            '10400' => null,
            '10500' => null,
            '10700' => null,
            '10710' => null,
            '10810' => null,
            '10820' => null,
            '10830' => null,
            '10840' => null,
            '14608' => null,
            '14620' => null,
            '14738' => null,
            '14740' => null,
            '14300' => null,
            '14308' => null,
            '14320' => null,
            '14330' => null,
            '14350' => null,
            '14357' => null,
            '14360' => null,
            '14370' => null,
            '14376' => null,
            '14377' => null,
            '14380' => null,
            '14386' => null,
            '14387' => null,
            '14388' => null,
            '14389' => null,
            '14390' => null,
            '14430' => null,
            '14438' => null,
            '14439' => null,
            '14000' => null,
            '14010' => null,
            '14020' => null,
            '14030' => null,
            '14039' => null,
            '14049' => null,
            '14080' => null,
            '14090' => null,
            '14100' => null,
            '14110' => null,
            '14120' => null,
            '14140' => null,
            '14150' => null,
            '14210' => null,
            '14220' => null,
            '14239' => null,
            '14240' => null,
        ];


        if(Arr::exists($array, $request['codigo_postal']) == true){
            $aux = 1;
        }else{
            $aux = 0;
            $correo = new CoberturaMailble;
            $correo2 = new CoberturaFuminanteMailble($request);// Sin cobertura

            
            Mail::to(auth()->user()->email)->send($correo);
            Mail::to('enrique.chavez.r97@gmail.com')->send($correo2);//Fuminantes
            Mail::to('eduardovtc@fuminante.com')->send($correo2);
            Mail::to('karla@fuminante.com')->send($correo2);

            // Instantiate the WhatsAppCloudApi super class.
                $whatsapp_cloud_api = new WhatsAppCloudApi([
                    'from_phone_number_id' => '111659674925893',
                    'access_token' => 'EAAFto9RH8bQBAJy6Hg6MM1mqIsjx3HhhLcoai2Cr9RtVKKeYJl9hJaWpQFbiJ90cuwQ4VEveTg6rG2zoZALAWQJZCFd0gTU1JjzBnknaWwg0J6tb36fhZA2tiBKQGlLmx8SFutP1jloiNtsIAV2viNUwbdWZCSLOVX7vZCTnD6dC88MIWXGjwkLXiNN540IomAh7LCAidZAwZDZD',
                ]);

                //$whatsapp_cloud_api->sendTemplate('525543578457', 'hello_world', 'en_US'); // Language is optional
                //$whatsapp_cloud_api->sendTextMessage('525543578457', 'Hola');
        }

        if($request['residencial'] == "Para mi negocio"){
            if($request['superficie'] <= 100){
                $super = 899;
            }else{
                $super = "Un ejecutivo se pondra en contacto contigo";
                $aux = 3;
                //Correo electrónico para usuario y fuminantes
                $superficie = new SuperficieMailble;
                $superficie2 = new SuperficieFumMailble($request);

                Mail::to(auth()->user()->email)->send($superficie);
                Mail::to('enrique.chavez.r97@gmail.com')->send($superficie2);//fuminantes
                Mail::to('eduardovtc@fuminante.com')->send($superficie2);
                Mail::to('karla@fuminante.com')->send($superficie2);
            }
        }else{
                if($request['superficie'] <= 200){
                    $super = 849;
                }else if($request['superficie'] >= 201 && $request['superficie'] <= 400){
                    $super = 999;
                }else{
                    $super = 1299; 
                }
            }

            session(['servicio' => $request['residencial']]);
            session(['Tiposervicio' => $request['servicio']]);
            session(['superficie' => $request['superficie']]);
            session(['cp' => $request['codigo_postal']]);
            session(['costo' => $super]);


        //$user = DB::table('inmuebles')->where('user_id', auth()->user()->id)->get();
        //return $user;

        return view('client.reservacion.filtertwo', compact('aux', 'super', 'request'));
    }

    public function filtertree()
    {
        // si contacto esta vacio se muestra
        // Si inmueble esta vacio se muestra, en caso contrario mostramos los inmuebles registrados

        $contact = DB::table('client_contacts')->where('user_id', auth()->user()->id)->first();
        
        $id = session('reservacion');
        $id_inmueble = session('inmueble');
        
        $check = DB::table('reservacions')->where('id', $id)->get();
        $inmueble = DB::table('inmuebles')->where('id', $id_inmueble)->get();

        //agendar fecha


        return view('client.reservacion.filtertree', compact('contact', 'check', 'inmueble'));

    }

    public function filterContact(Request $request){

        $request->all();

        $result = DB::table('client_contacts')->insertGetId([
            'user_id' => auth()->user()->id , 
            'apellidos' => $request['apellidos'],
            'telefono' => $request['telefono'],
        ]);

        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '100860192712099',
            'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
        ]);


        try {
            $ex = '52';
            $num = $ex . $request['telefono'];    

            //$men = 'Hola '.$nombre.', su servicio de fumigación esta reservado para el día '. $fecha .' a las '. $hora .'. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';  
            $whatsapp_cloud_api->sendTemplate( $num, 'bienvenida', 'es_MX'); // Language is optional

        } catch (Exception $e){

        }


        return redirect()->route('filterone');

    }

    public function whats(){

        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '100860192712099',
            'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
        ]);

        try {
            $ex = '52';
            $num = $ex . 7791049201;

            $fecha = "16 de junio del 2022";
            $hora = "13:00 pm";
            $nombre = "Enrique";
    

            $men = 'Hola '.$nombre.', su servicio de fumigación esta reservado para el día '. $fecha .' a las '. $hora .'. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';  

            //$whatsapp_cloud_api->sendTemplate( $num, 'recordatorio_bienvenida', 'es_MX'); // Language is optional
            $whatsapp_cloud_api->sendTextMessage($num, $men);
            echo "Mensaje enviado correctamente";

        } catch (Exception $e){

            echo "Error al  mandar mensaje";

        }

        $fecha = "16 de junio del 2022";
        $hora = "13:00 pm";

        $men = 'Hola Eduardo, su servicio de fumigación esta reservado para el día '. $fecha .' a las '. $hora .'. 
        En caso que no esté pagado aun su servicio, 
        le recordamos que puede hacerlo el día de la visita en efectivo 
        o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';       
        
        
        // Fechas
        //$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        //$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
        //echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

    }

    public function star(){

        $data = array(
            'auth' => '$---$',
            'e_0' => 'Mi casa'
         );

        $url = "https://com-atmx-fuminante.appspot.com/test/search";
         
         $client = new \GuzzleHttp\Client();
         $response = $client->post($url, [
             'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
             'body'    => json_encode($data)
         ]); 

         //return json_decode($response->getBody()->getContents() );
         //return json_decode($response->getBody()->getContents() );

         $aux = json_decode($response->getBody()->getContents() );

         return $aux->client_id;

         //return view('prueba')->with([
        // 'json' => $aux,
        //]);
         
    }


}
