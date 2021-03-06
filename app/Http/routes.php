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

//Rotas de Revisão
Route::post('/revisoes/new', 'RevisaoController@store');
Route::post('/revisao/{revisao}/avaliar', 'RevisaoController@rate');

//Rotas dos usuários
Route::get('usuarios', 'UsuarioController@index');
Route::get('usuario/{livro}', 'UsuarioController@show');
Route::get('/editprofile/{id}','UsuarioController@showedit');
Route::post('/usuario/{id}/update','UsuarioController@update');

//Rotas dos anúncios
Route::get('anuncio/new', 'AnuncioController@newOne');
Route::post('anuncio/new', 'AnuncioController@create');
Route::get('anuncio/meus', 'AnuncioController@meus');
Route::delete('anuncio/{anuncio}/delete', 'AnuncioController@delete');

//Rota das categorias
Route::get('categorias', 'CategoriasController@index');
Route::get('categorias/{categoria}', 'CategoriasController@show');
Route::post('categoria/new', 'CategoriasController@store');
Route::delete('categorias/{categoria}/delete', 'CategoriasController@delete');

//Rotas de pesquisa
Route::get('buscar', 'BuscaController@buscar');

//Rota do Sol
Route::auth();

//Rotas das denúncias
Route::get('usuario/{usuario}/denuncia', 'DenunciaController@show');
Route::post('usuario/{usuario}/denunciar', 'DenunciaController@denunciar');
Route::get('denuncias', 'DenunciaController@list');

Route::get('/home', 'HomeController@index');
