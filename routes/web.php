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

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home/{filtro}', 'ClienteController@Filtro');
Route::get('/home', 'ClienteController@index');

Route::resource('/contacto', 'ContactoController');
Route::resource('/ramo','RamoController');
Route::resource('/empresa','EmpresaController');
Route::resource('/metodo_cobro','MetodoCobroController');
Route::resource('/empresa','EmpresaController');
Route::resource('/estatus', 'EstatusController');
Route::resource('/forma_pago', 'FormaPagoController');
Route::resource('/condicion_cobro', 'CondicionCobroController');
Route::resource('/poliza', 'PolizaController');
Route::resource('/cliente', 'ClienteController');

Route::get('/cliente/{id}', 'ClienteController@show');
Route::get('/tel/{id}/{idtel}', 'ClienteController@destroyTel');
Route::get('/empresa/{id}', 'EmpresaController@show');

Route::patch('/telU/{id}','EmpresaController@insertTelU');
Route::get('/tel/{id}/{idtel}','EmpresaController@destroyTel');
Route::get('tel/{id}/{idtel}', 'ClienteController@EliminarTelefono');

Route::get('delcuenta/{id}/{cliente}', 'ClienteController@EliminarCuenta');
Route::get('/f', 'FileController@index');
Route::post('/files/{file}', 'FileController@store')->name('files.store');
Route::get('/filesd/{file}/{archivo}', 'FileController@destroy')->name('files.destroy');
Route::get('/files/{file}/download', 'FileController@download')->name('files.download');

Route::get('/estPoliza/{id}','PolizaController@destroyEstatusP');

Route::resource('/calendario', 'PendienteController')->middleware('auth');

Route::get('/notifi','PendienteController@Notifications');
