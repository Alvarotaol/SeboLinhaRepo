<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Para os comandos SQL """"Puros""""
use DB;

class LivroController extends Controller
{
	//
	public function index()
	{
		$livros = DB::select('select * from Livros');
		$pagename = 'Lista de livros';
		return view('pages.livros', [
			'livros'  	=> $livros,
			'pagename'	=> $pagename
		]);
	}

	public function show($livro)
	{
		$getlivro = DB::select('select * from Livros where id = ?', [$livro]);
		return view('pages.livroindex', [
			'livros'	=> $getlivro
		]);
	}

	public function create()
	{	
	 	$livro = DB::insert('INSERT INTO Livros (titulo, isbn, idioma, autor)
	 						VALUES (?, ?, ?, ?)',	[$request->nome,
	 						                     	$request->isbn,
	 						                     	$request->idioma,
	 						                     	$request->autor]);

		$pagename = 'Lista de livros';
		return view('pages.livros', [
			'livros'  	=> $livros,
			'pagename'	=> $pagename
		]);
	}
	public function delete()
	{
	
	}
	
}
