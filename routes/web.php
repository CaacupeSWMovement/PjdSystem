<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use PJD\Persona;
use Intervention\Image\Facades\Image as Image;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('localidad/parroquia','LocalidadController');
Route::resource('inscripcion','PersonaController');
Route::get('imagenes/{imagen}', function ($imagen){
    //es posible reducir la imagen que se muestra, pero ya fue reducida en carga 
    $img = Image::make(storage_path('app/fotos/' . $imagen))->response();
    return $img;
});
Route::get('permisos/{imagen}', function ($imagen){
    //es posible reducir la imagen que se muestra, pero ya fue reducida en carga 
    $img = Image::make(storage_path('app/permisos/' . $imagen))->response();
    return $img;
});
Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/logout', 'LoginController@logout');

Route::get('/{slug?}', 'HomeController@index');