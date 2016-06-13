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

//Route::get('/', 'LayoutController@home');
Route::get('/', 'AnuncioController@index');

//Rotas dos livros
Route::get('livros', 'LivroController@index');
Route::get('livro/{livro}', 'LivroController@show');
Route::post('livros/new', 'LivroController@store');
Route::delete('livro/{livro}/delete', 'LivroController@delete');

//Rotas dos usuários
Route::get('usuarios', 'UsuarioController@index');
Route::get('usuario/{livro}', 'UsuarioController@show');

//Rotas dos anúncios
Route::get('anuncio/new', 'AnuncioController@new');
Route::post('anuncio/new', 'AnuncioController@create');
Route::get('anuncio/meus', 'AnuncioController@meus');

//Rota do Sol
Route::auth();

Route::get('/home', 'HomeController@index');
