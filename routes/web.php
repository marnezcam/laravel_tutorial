<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|AQUI LO QUE PUEDO OBSERVAR ES QUE LA RUTA TIENE ACCESO DIRECTO A LAS VISTAS
|ES DECIR QUE LOS DOC PHP DE ROUTE TIENEN ACCESO DIRECTO A VIEWS
|TIENE ACCESO  A VIEW
*/

Route::get('/', function () {
    return view('auth.login');
});
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/create', [EmpleadoController::class,'create']);
*/
Route::resource('empleado',EmpleadoController::class)->middleware('auth');
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/', [EmpleadoController::class, 'index'])->name('home');

});




