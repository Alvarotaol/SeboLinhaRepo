<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Log;
//Para os comandos SQL """"Puros""""
use DB;

class LivroController extends Controller
{
	//
	public function index()
	{
		$livros = DB::select('select * from livros');
		$categorias = DB::select('select * from categorias');
		$pagename = 'Lista de livros';
		return view('pages.livros', [
			'livros'  	=> $livros,
			'pagename'	=> $pagename,
			'categorias' => $categorias
		]);
	}

	public function show($livro)
	{
		$getlivro = DB::select('select * from livros where id = ?', [$livro])[0];

		$revisoes = DB::select(' SELECT revisoes.texto, usuarios.nome, revisoes.data
							FROM revisoes
							INNER JOIN usuarios
							ON revisoes.idUsuario=usuarios.id
							WHERE revisoes.idLivro = ?', [$livro]);
		
		$categorias = DB::select('SELECT categorias.nome
							FROM categorias
							INNER JOIN categorias_livros
							ON categorias.id=categorias_livros.idCategoria
							WHERE categorias_livros.idLivro = ?', [$livro]);

		return view('pages.livroindex', [
			'livro'   	=> $getlivro,
			'revisoes'	=> $revisoes,
			'categorias' => $categorias
		]);
	}

	public function store(Request $request)
	{	
	 	DB::insert('INSERT INTO livros (titulo, isbn, idioma, autor) VALUES (?, ?, ?, ?)', [$request->titulo, $request->isbn, $request->idioma, $request->autor]);
	 	
	 	$idCategoria = $request->input('categoria');
	 	$idLivro = DB::table('livros')->max('id'); // Equivalente ao codigo SQL: 'SELECT MAX(id) FROM livros'

	 	DB::insert('INSERT INTO categorias_livros (idCategoria, idLivro) VALUES (?, ?)', [intval($idCategoria), intval($idLivro)]);
	 	return back();
	}
	public function delete($livro)
	{
		DB::delete('DELETE FROM livros WHERE id = ?', [$livro]);
		return back();
	}
	
}
