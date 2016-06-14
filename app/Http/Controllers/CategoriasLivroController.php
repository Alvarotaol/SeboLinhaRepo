<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Para os comandos SQL """"Puros""""
use DB;



class CategoriasLivroController extends Controller
{
	public function store($categoria, $livro)
	{	
	 	

	 	//return $request->all();
	 	DB::insert('INSERT INTO livros (titulo, isbn, idioma, autor) VALUES (?, ?, ?, ?)', [$request->titulo, $request->isbn, $request->idioma, $request->autor]);

	 	return redirect()->action('CategoriasController@livroCategoria', [$request]);
	}
	
}
