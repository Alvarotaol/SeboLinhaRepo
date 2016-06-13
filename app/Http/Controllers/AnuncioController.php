<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

//Para os comandos SQL """"Puros""""
use DB;

class AnuncioController extends Controller
{
	//
	public function index()
	{
		$anuncios = DB::select('select anuncios.id as id, preco, livros.id as idLivro, nome, titulo, tipo from anuncios, livros, usuarios where anuncios.idLivro = livros.id and anuncios.idUsuario = usuarios.id');
		$pagename = 'Meus anúncios';
		$cores = json_decode(json_encode(['33cc33', '3399ff', 'ffcc00']));
		return view('pages.anuncioindex', [
			'anuncios'  => $anuncios,
			'pagename'	=> $pagename,
			'cores' => $cores
		]);
	}

	public function meus()
	{
		$anuncios = DB::select('select anuncios.id as id, preco, livros.id as idLivro, titulo, tipo from anuncios, livros where idUsuario = ? and anuncios.idLivro = livros.id', [Auth::user()->id]);
		$pagename = 'Meus anúncios';
		return view('pages.meusanuncios', [
			'anuncios'  => $anuncios,
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
	 	//return Auth::user();
	 	DB::insert('INSERT INTO anuncios (tipo, preco, data, idLivro, idUsuario) VALUES (?, ?, ?, ?, ?)', [$request->tipo, $request->preco, date('Y/m/d'), $request->livro, Auth::user()->id]);
	 	return back();
	}

	public function new()
	{
		$tipos = [['id' => 0, 'nome' => 'venda'], ['id' => 1, 'nome' => 'compra'], ['id' => 2, 'nome' => 'emprestimo']];
		$tipos2 = json_decode(json_encode($tipos));
		//$tipos = [['id' => '0', 'nome' => 'venda']];
		$livros = DB::select('select * from livros');
		return view('pages.anuncionew', [
			'tipos' => $tipos2,
			'livros' => $livros
		]);
	}

	public function delete($anuncio)
	{
		DB::delete('DELETE FROM anuncios WHERE id = ?', [$anuncio]);
		return back();
	}
	
}
