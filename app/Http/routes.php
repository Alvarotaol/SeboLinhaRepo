<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//	$coragem = 'teste 1';
//	$yuuki = "teste 2 ";
//	$brave = "teste 3 ";
  	
//	return view('application', [
//		'coragem'	=> $coragem,
//		'yuuki'  	=> $yuuki,
//		'brave'  	=> $brave
//	]);
// });

//Route::get('/', 'LayoutController@home');
Route::get('/', function(){
	return view('main');
});

Route::get('livros', 'LivroController@index');