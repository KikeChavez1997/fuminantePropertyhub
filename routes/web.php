<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientContactController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\InmueblesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\WebhooksController;
use App\Http\Controllers\InvContact;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


//////////////////////////////////////////////// Login Google

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/login/google/callback', function () {
    $googleuser = Socialite::driver('google')->user();

	//return dd($googleuser->getId());

	/*
	$user = User::where('provider_id', $googleuser->getId())->first();
 
    if ($user) {
        $user->update([
            'remember_token' => $googleuser->token
        ]);
    } else {
        $user = User::create([
            'name' => $googleuser->name,
            'email' => $googleuser->email,
            'provider_id' => $googleuser->getId(),
            'remember_token' => $googleuser->token,
        ]);
    }
	*/
	
	$user = User::firstOrCreate(
		[
			'provider_id' => $googleuser->getId()
		],
		[
			'email' => $googleuser->getEmail(),
			'name' => $googleuser->getName(),
		]
	);
	/*
	$user = User::create([
		'email' => $googleuser->getEmail(),
		'name' => $googleuser->getName(),
		'provider_id' => $googleuser->getId(),
	]);
	*/

	auth()->login($user, true);

	return redirect('home');

});

//////////////////////////////////////////////////


Route::get('/', function () {
		
	if(auth()->check()){
			return redirect()->route('home');
		}else{
			return view('welcome');
		}
	})->name('inicio');

Route::get('guest', [App\Http\Controllers\InvContactController::class, 'index'])->name('guest'); 

Route::post('guest/info', [App\Http\Controllers\InvContactController::class, 'store'])->name('guest.info');

Route::post('guest/register', [App\Http\Controllers\UserController::class, 'stor'])->name('user.info');

Route::post('guest/fecha', [App\Http\Controllers\InvContactController::class, 'fecha'])->name('guest.fecha');

Route::post('guest/horario', [App\Http\Controllers\InvContactController::class, 'horario'])->name('guest.horario');

Route::post('guest/reservacion', [App\Http\Controllers\InvContactController::class, 'pago'])->name('guest.pago');

Route::get('guest/orders/success', [App\Http\Controllers\InvContactController::class, 'success'])->name('guest.order.success');

Route::get('guest/orders/failure', [App\Http\Controllers\InvContactController::class, 'failure'])->name('guest.order.failure');

Route::get('guest/orders/pending', [App\Http\Controllers\InvContactController::class, 'pending'])->name('guest.order.pending');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth'); 


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::resource('contact', ClientContactController::class)->middleware('auth')->names('client.contact');

Route::resource('historial', HistorialController::class)->middleware('auth')->names('client.historial');

Route::resource('inmueble', InmueblesController::class)->middleware('auth')->names('client.inmueble');

Route::resource('reservacion', ReservacionController::class)->middleware('auth')->names('client.reservacion');

Route::post('reservacion/fecha', [App\Http\Controllers\ReservacionController::class, 'fecha'])->middleware('auth')->name('client.fecha');

Route::post('reservacion/rapido', [App\Http\Controllers\ReservacionController::class, 'rapido'])->middleware('auth')->name('client.rapidamente');

Route::post('reservacion/horario', [App\Http\Controllers\ReservacionController::class, 'horario'])->middleware('auth')->name('client.horario');

Route::get('user/reservacion', [App\Http\Controllers\ReservacionController::class, 'filterone'])->middleware('auth')->name('filterone');

Route::post('user/reservacion/disponibilidad', [App\Http\Controllers\ReservacionController::class, 'filtertwo'])->middleware('auth')->name('filtertwo');

Route::get('user/reservacion/fecha', [App\Http\Controllers\ReservacionController::class, 'filtertree'])->middleware('auth')->name('filtertree');

Route::post('user/reservacion/contact', [App\Http\Controllers\ReservacionController::class, 'filterContact'])->middleware('auth')->name('filterContact');

Route::get('orders/success', [App\Http\Controllers\OrderController::class, 'success'])->middleware('auth')->name('order.success');

Route::get('orders/efectivo', [App\Http\Controllers\OrderController::class, 'efectivoPay'])->middleware('auth')->name('order.efectivoPay');

Route::get('orders/transferencia', [App\Http\Controllers\OrderController::class, 'transferenciaPay'])->middleware('auth')->name('order.transferenciaPay');

Route::get('orders/failure', [App\Http\Controllers\OrderController::class, 'failure'])->middleware('auth')->name('order.failure');

Route::get('orders/pending', [App\Http\Controllers\OrderController::class, 'pending'])->middleware('auth')->name('order.pending');

Route::post('webhooks', WebhooksController::class);

Route::get('postman', [App\Http\Controllers\ReservacionController::class, 'whats'])->middleware('auth')->name('postman');




