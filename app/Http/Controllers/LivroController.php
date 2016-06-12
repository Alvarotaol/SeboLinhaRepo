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
		$livros = DB::select('select * from livros');
		$pagename = 'Lista de livros';
		return view('pages.livros', [
			'livros'  	=> $livros,
			'pagename'	=> $pagename
		]);
	}

	public function show($livro)
	{
		$getlivro = DB::select('select * from livros where id = ?', [$livro]);
		return view('pages.livroindex', [
			'livros'	=> $getlivro
		]);
	}

	public function store(Request $request)
	{	
	 	//return $request->all();
	 	DB::insert('INSERT INTO livros (titulo, isbn, idioma, autor) VALUES (?, ?, ?, ?)', [$request->titulo, $request->isbn, $request->idioma, $request->autor]);
	 	return back();
	}
	public function delete($livro)
	{
		DB::delete('DELETE FROM livros WHERE id = ?', [$livro]);
		return back();
	}
	
}
