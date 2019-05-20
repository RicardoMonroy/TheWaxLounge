<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@welcome');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('messages', function(){
    // Enviar
    $data =  request()->all();
    Mail::send("emails.message", $data, function($message) use ($data){
        $message->from($data['email'], $data['name'])
            ->to('rmonroy.rodriguez@gmail.com', 'Ricardo')
            ->subject($data['subject']);
    });
    // Responder
    return back()->with('flash', $data['name'].', your message has been received');
})->name('messages');