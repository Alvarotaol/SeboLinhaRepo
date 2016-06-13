<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Para os comandos SQL """"Puros""""
use DB;

class AnuncioController extends Controller
{
	//
	public function index()
	{
		$anuncios = DB::select('select * from anuncios');
		$pagename = 'Lista de anúncios';
		return view('pages.anuncios', [
			'anuncios'  	=> $anuncios,
			'pagename'	=> $pagename
		]);
	}

	public function show($anuncio)
	{
		$getanuncio = DB::select('select * from anuncios where id = ?', [$anuncio]);
		return view('pages.anuncioindex', [
			'anuncios'	=> $getanuncio
		]);
	}

	public function create(Request $request)
	{	
	 	//return $request->all();
	 	DB::insert('INSERT INTO anuncios (tipo, preco, data, idLivro, idUsuario) VALUES (?, ?, ?, ?, ?)', [$request->tipo, $request->preco, hoje, $request->idLivro, $request->idUsuario]);
	 	return back();
	}

	public function new()
	{
		$tipos = [['id' => 0, 'nome' => 'venda'], ['id' => 1, 'nome' => 'compra'], ['id' => 2, 'nome' => 'emprestimo']];
		$tipos2 = json_decode(json_encode($tipos));
		//$tipos = [['id' => '0', 'nome' => 'venda']];
		//$getanuncio = DB::select('select * from usuarios where id = 1');
		return view('pages.anuncionew', [
			'tipos' => $tipos2,
			'pagename' => 'Vicor'
		]);
	}

	public function delete($anuncio)
	{
		DB::delete('DELETE FROM anuncios WHERE id = ?', [$anuncio]);
		return back();
	}
	
}
