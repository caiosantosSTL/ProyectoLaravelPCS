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

use App\Http\Controllers\Control_pc;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('tablapcTOP', 'Control_pc@ShowTabla')->name('tablapc');

/* name é o nome da variavel de route, no qual podemos colocar para fazer uma referencia 
ao nome tablapcTOP, que vai aparecer no topo da direcao do site
*/

Route::get('putinfoTOP', 'Control_pc@Formux');

//putinfoTOP é o nome da direcao que vai aparecer no topo do site http:/localhost/pcs/public/putinfoTOP

Route::post('poner', 'Control_pc@Poner_Info');


Route::get('gohome', function(){
    return view('/home');
});

// butons ====

Route::get('/verInfo/{Id}', 'Control_pc@VerInfox');
Route::get('/deletInfo/{Id}', 'Control_pc@DeletInfox');

//=========== edit
Route::get('/editInfo/{Id}', 'Control_pc@EditInfox')->name('ruta_edit');
Route::post('/editInfo/update', 'Control_pc@go_update');

//PDF
Route::get('/crearPDF', 'Control_pc@MakePDF')->name('pdf');