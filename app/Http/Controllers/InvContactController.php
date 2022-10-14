<?php

namespace App\Http\Controllers;

use App\Mail\InvCoberturaFumiMailble;
use App\Mail\InvCoberturaMailble;
use App\Mail\InVEfectivoMailble;
use App\Mail\InVMercadoPAgoMailble;
use App\Mail\InVNotifiFuminanteMailble;
use App\Mail\InvSuperficieFumiMailble;
use App\Mail\InvSuperficieMailble;
use App\Mail\InVTransferenciaMailble; 
use App\Models\InvContact;
use Exception;
use Illuminate\Http\Request;
use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;





class InvContactController extends Controller
{
    
    public function index()
    {
        return view('guest.index');
    }

   
    public function create()
    {
        //
    } 

   
    public function store(Request $request)
    {
        $request->validate([
            'inVnombre' => 'required',
            'inVtelefono' => 'required|max:10',
            'inVcorreo_electronico' => 'required',
            'inVcodigo_postal' => 'required|max:5',
            'inVsuperficie' => 'required|max:6'
        ]);

        $request->all();

        session(['inVnombre' => $request['inVnombre']]);
        session(['inVapellidos' => '***']);
        session(['inVtelefono' => $request['inVtelefono']]);
        session(['inVcorreo_electronico' => $request['inVcorreo_electronico']]);
        session(['inVresidencial' => $request['inVresidencial']]);
        session(['inVservicio' => $request['inVservicio']]);
        session(['inVsuperficie' => $request['inVsuperficie']]);
        session(['inVcodigo_postal' => $request['inVcodigo_postal']]);
        session(['inVperiodicidad' => 'eventual']);
        //session(['inVtipoPago' => $request['inVtipoPago']]);

        $contact = DB::table('inv_contacts')->insertGetId([
            'inVnombre' => session('inVnombre'),
            'inVapellidos' => session('inVapellidos'),
            'inVtelefono' =>  session('inVtelefono'),
            'inVcorreo_electronico' => session('inVcorreo_electronico'),
        ]);

        session(['user_id' => $contact]);

        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '100860192712099',
            'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
        ]);

        try {
            $ex = '52';
            $num = $ex .  session('inVtelefono');

            //$men = 'Hola '.$nombre.', su servicio de fumigación esta reservado para el día '. $fecha .' a las '. $hora .'. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';  

            $whatsapp_cloud_api->sendTemplate( $num, 'bienvenida', 'es_Mx' ); // Language is optional
            
        } catch (Exception $e){

        } 

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

        if(Arr::exists($array, $request['inVcodigo_postal']) == true){
            $aux =1;
        }else{
            $aux = 0;
            $correo = new InvCoberturaMailble;
            $correo2 = new InvCoberturaFumiMailble($request);// Sin cobertura

            
            Mail::to($request['inVcorreo_electronico'])->send($correo);
            Mail::to('enrique.chavez.r97@gmail.com')->send($correo2);
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

        if($request['inVresidencial'] == "Para mi negocio"){
            if($request['inVsuperficie'] <= 60){
                $super = 850;
                session(['costo' => $super]);
            }else if($request['inVsuperficie'] >= 61 && $request['inVsuperficie'] <= 100 ){
                $super = 1000;
                session(['costo' => $super]);
            }else{
                $aux = 3;
                $super = "Un ejecutivo se pondra en contacto contigo";
                //Correo electrónico para usuario y fuminantes
                $superficie = new InvSuperficieMailble;
                $superficie2 = new InVSuperficieFumiMailble($request);

                Mail::to($request['inVcorreo_electronico'])->send($superficie);
                Mail::to('enrique.chavez.r97@gmail.com')->send($superficie2);
                Mail::to('eduardovtc@fuminante.com')->send($superficie2);
                Mail::to('karla@fuminante.com')->send($superficie2);
            }
        }else{
                if($request['inVsuperficie'] <= 60){
                    $super = 850;
                    session(['costo' => $super]);
                }else if($request['inVsuperficie'] >= 61 && $request['inVsuperficie'] <= 100){
                    $super = 1000;
                    session(['costo' => $super]);
                }else if($request['inVsuperficie'] >= 101 && $request['inVsuperficie'] <= 300){
                    $super = 1500;
                    session(['costo' => $super]);
                }else if($request['inVsuperficie'] >= 301 && $request['inVsuperficie'] <= 500){
                    $super = 2000;
                    session(['costo' => $super]);
                }else if($request['inVsuperficie'] >= 501 && $request['inVsuperficie'] <= 1000){
                    $super = 2500;
                    session(['costo' => $super]);
                }else if($request['inVsuperficie'] >= 1001 && $request['inVsuperficie'] <= 2000){
                    $super = 3000;
                    session(['costo' => $super]);
                }else if($request['inVsuperficie'] >= 2001 && $request['inVsuperficie'] <= 2500){
                    $super = 1.5 * $request['inVsuperficie'];
                    session(['costo' => $super]);
                }else {
                    $super = 1.2 * $request['inVsuperficie'];
                    session(['costo' => $super]);
                }
            }

        session(['inVpago' => $super]);

        return view('guest.costo', compact('aux', 'super', 'request'));
    }

    public function pago (Request $request){

        session(['inVnombre_negocio' => $request['inVnombre_negocio']]);
        session(['inVrfc' => $request['inVrfc']]);
        session(['inVcalle' => $request['inVcalle']]);
        session(['inVnumero_interior' => $request['inVnumero_interior']]);
        session(['inVnumero_exterior' => $request['inVnumero_exterior']]);
        session(['inVcolonia' => $request['inVcolonia']]);
        session(['inValcaldia' => $request['inValcaldia']]);
        session(['inVtipoPago' => $request['inVtipoPago']]);

        
        if(session('inVtipoPago') == 'transferencia'){

            $pago = new InVTransferenciaMailble($request);
            Mail::to(session('inVcorreo_electronico'))->send($pago);
            Mail::to('eduardovtc@fuminante.com')->send($pago);
            Mail::to('karla@fuminante.com')->send($pago);

        }elseif(session('inVtipoPago') == 'efectivo'){

            $pago = new InVEfectivoMailble($request);
            Mail::to(session('inVcorreo_electronico'))->send($pago);
            Mail::to('eduardovtc@fuminante.com')->send($pago);
            Mail::to('karla@fuminante.com')->send($pago); 

        }
        /*
        return view('guest.pago');
        */

        return view('guest.order.calendarizar');

    }

    public function fecha(Request $request){

        $request->all();

        session(['InvfechaRes' => $request['fechaRes']]);

        //$datos = DB::table('inv_historials')->where('fecha', $request['fechaRes'])->get();

        $hora1 = DB::table('inv_historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '9:00']
        ])->exists();

        $hora2 = DB::table('inv_historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '11:00']
        ])->exists();

        $hora3 = DB::table('inv_historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '13:00']
        ])->exists();

        $hora4 = DB::table('inv_historials')->where([
            ['fecha', $request['fechaRes']],
            ['hora', '16:00']
        ])->exists();

        //return $hora2;

        return view('guest.order.horario', compact('hora1', 'hora2', 'hora3', 'hora4'));

    }

    public function horario(Request $request){

        //Mensaje de whats
        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '100860192712099',
            'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
        ]);

        try {

            setlocale(LC_TIME, "spanish");
            $fecha = '2021/11/18';
            $fecha = str_replace("/", "-", session('InvfechaRes') ); 
            $newDate = date("d-m-Y", strtotime(session('InvfechaRes') )); 
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));

            $ex = '52';
            $num = $ex . session('inVtelefono');

            $hora = session('InvHorarioWhats');

            $men = 'Hola '. session('inVnombre') .', su servicio de fumigación esta reservado para el día '. $mesDesc .' a las '. $hora .' horas. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';  

            $whatsapp_cloud_api->sendTextMessage($num, $men);
            
        } catch (Exception $e){

        }

        $user = DB::table('inv_users')->insertGetId([
            'id_user' => session('user_id'),
            'inVnombre_negocio' => session('inVnombre_negocio'),
            'inVrfc' =>  session('inVrfc'),
            'inVcalle' => session('inVcalle'),
            'inVnumero_interior' => session('inVnumero_interior'),
            'inVnumero_exterior' => session('inVnumero_exterior'),
            'inVcolonia' => session('inVcolonia'),
            'inValcaldia' => session('inValcaldia'),
            'inVperiodicidad' => session('inVperiodicidad'),
        ]);

        //Registro de servicio
        

        //return $historial;
        
        $request->all();

        session(['InvHorario' => $request['InvHorario']]);

        if($request['InvHorario'] == '9:00'){
            session(['InvHorarioWhats' => '9:00 am']);

        }else if($request['InvHorario'] == '11:00'){
            session(['InvHorarioWhats' => '11:00 am']);

        }else if($request['InvHorario'] == '13:00'){
            session(['InvHorarioWhats' => '13:00 pm']);

        }else if($request['InvHorario'] == '16:00'){
            session(['InvHorarioWhats' => '16:00 pm']);
        }

        $historial = DB::table('inv_historials')->insertGetId([
            'user_id' => session('user_id'),
            'clientIdApi' => '',
            'fecha' => session('InvfechaRes'),
            'hora' => session('InvHorario'),
            'descripcion' =>  session('inVservicio'),
            'monto' => session('costo'),
        ]);

        return view('guest.pago');

    }

    public function success (Request $request){

        $user = DB::table('inv_users')->insertGetId([
            'id_user' => session('user_id'),
            'inVnombre_negocio' => session('inVnombre_negocio'),
            'inVrfc' =>  session('inVrfc'),
            'inVcalle' => session('inVcalle'),
            'inVnumero_interior' => session('inVnumero_interior'),
            'inVnumero_exterior' => session('inVnumero_exterior'),
            'inVcolonia' => session('inVcolonia'),
            'inValcaldia' => session('inValcaldia'),
            'inVperiodicidad' => session('inVperiodicidad'),
        ]);

        //Registro de servicio
        $historial = DB::table('inv_historials')->insertGetId([
            'user_id' => session('user_id'),
            'clientIdApi' => '',
            'fecha' => session('InvfechaRes'),
            'hora' => session('InvHorario'),
            'descripcion' =>  session('inVservicio'),
            'monto' => session('costo'),
        ]);

        //Registro de contacto
        $historial = DB::table('inv_contacts')->insertGetId([
            'idApiClient' => '',
            'inVnombre' => session('inVnombre'),
            'inVapellidos' => session('inVapellidos'),
            'inVtelefono' =>  session('inVtelefono'),
            'inVcorreo_electronico' => session('inVcorreo_electronico'),
        ]);

        /////////////////////////////////////////////////////////// User

        $data = array(
            'auth' => '$1kbxN4UprP1VwUHGj2GuQOBe/3/nRNP38VulEy.ECc3KIO6QDNf5W$',
            'e_0' => session('inVnombre'),
            'e_1' => 'MC-117',
            'e_2' => session('inVcalle'),
            'e_3' => '0',
            'e_4' => session('inVnumero_interior'),
            'e_5' => session('inVcolonia'),
            'e_6' => session('inValcaldia'),
            'e_7' => 'Ciudad de México',
            'e_8' => session('inVcodigo_postal'),
            'e_9' => session('inVservicio'),
            'e_10' => session('inVsuperficie'),
            'e_11' =>  session('inVperiodicidad'),
            'e_12' => session('inVtipoPago')
         );

        //return $data;

        $url = "https://com-atmx-fuminante.appspot.com/ws/client";
         
         $client = new \GuzzleHttp\Client();
         $response = $client->post($url, [
             'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
             'body'    => json_encode($data)
         ]); 

         $aux = json_decode($response->getBody()->getContents() );
         //return $aux->client_id;

         ////////////////////////////////////////////////// Contact

         $data1 = array(
            'auth' => '$1kbxN4UprP1VwUHGj2GuQOBe/3/nRNP38VulEy.ECc3KIO6QDNf5W$',
            'e_0' => $aux->client_id,
            'e_1' => session('inVnombre'),
            'e_2' => session('inVapellidos'),
            'e_3' => session('inVtelefono'),
            'e_4' => session('inVcorreo_electronico')
         );

         $url1 = "https://com-atmx-fuminante.appspot.com/ws/contact";
         
         $client = new \GuzzleHttp\Client();
         $response = $client->post($url1, [
             'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
             'body'    => json_encode($data1)
         ]);
         
         /////////////////////////////////////////////////// Servicio cliente

         $data2 = array(
            'auth' => '$1kbxN4UprP1VwUHGj2GuQOBe/3/nRNP38VulEy.ECc3KIO6QDNf5W$',
            'e_0' => $aux->client_id,
            'e_1' => session('InvfechaRes'),
            'e_2' => session('InvHorario'),
         );

         $url2 = "https://com-atmx-fuminante.appspot.com/ws/schedule";
         
         $client = new \GuzzleHttp\Client();
         $response = $client->post($url2, [
             'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
             'body'    => json_encode($data2)
         ]);
         

        //Mensaje de whats
        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => '100860192712099',
            'access_token' => 'EAAFto9RH8bQBAKVo55Q2Fak8zUV4pDEQqffkorc1UyOC7UR2yMhG1zEztfpCSVvxecBGPKIlM6DqBncBdmAY84ZC0NKfVNU4EafgOxbgLCch1I5V4NQ4ZAtKDfZBig3cTRYeIV4pvU8AmmMPzh24a025EJsjZAlyHI0McZApXvU9ZBytBGf6ZA0',
        ]);

        try {

            setlocale(LC_TIME, "spanish");
            $fecha = '2021/11/18';
            $fecha = str_replace("/", "-", session('InvfechaRes') ); 
            $newDate = date("d-m-Y", strtotime(session('InvfechaRes') )); 
            $mesDesc = strftime("%d de %B del %Y", strtotime($newDate));

            $ex = '52';
            $num = $ex . session('inVtelefono');

            $hora = session('InvHorarioWhats');

            $men = 'Hola '. session('inVnombre') .', su servicio de fumigación esta reservado para el día '. $mesDesc .' a las '. $hora .' horas. En caso que no esté pagado aun su servicio, le recordamos que puede hacerlo el día de la visita en efectivo o con tarjeta de crédito. Favor de estar pendiente de la llegada de nuestro técnico.';  

            $whatsapp_cloud_api->sendTextMessage($num, $men);
            
        } catch (Exception $e){

        }


        $pago = new InVMercadoPAgoMailble($request);
        $noti = new InVNotifiFuminanteMailble($request);
        Mail::to('enrique.chavez.r97@gmail.com')->send($noti); //Fuminante notificacion
        Mail::to('eduardovtc@fuminante.com')->send($noti);
        Mail::to('karla@fuminante.com')->send($noti);
        Mail::to(session('inVcorreo_electronico'))->send($pago);

        return view('guest.order.success', compact('request'));
    }

    public function failure (){
        return view('guest.order.failure');
    }

    public function pending(){
        return view('guest.order.pending');
    }

   
    public function show(InvContact $invContact)
    {
        //
    }

    
    public function edit(InvContact $invContact)
    {
        //
    }

   
    public function update(Request $request, InvContact $invContact)
    {
        //
    }

    
    public function destroy(InvContact $invContact)
    {
        //
    }
}
