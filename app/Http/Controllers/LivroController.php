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
		$categorias = DB::select('select * from categorias');
		$livros = DB::select('
							SELECT a.id, a.titulo, a.isbn, a.idioma, a.autor, COALESCE(b.total, 0) AS revisoes FROM
								(SELECT livros.id, livros.titulo, livros.isbn, livros.idioma, livros.autor FROM livros) AS a
							LEFT JOIN 
								(SELECT revisoes.idLivro, COUNT(*) AS total FROM revisoes GROUP BY idLivro) AS b
							ON a.id = b.idLivro
							');

		$pagename = 'Lista de livros';
		return view('pages.livros', [
			'livros'  	=> $livros,
			'pagename'	=> $pagename,
			'categorias' => $categorias
		]);
	}

	public function show($livro)
	{
		$getlivro = DB::select('SELECT id, titulo, isbn, idioma, autor, sumario, lancamento
								FROM livros
								WHERE id = ?', [$livro])[0];
		$anuncios = DB::select('SELECT anuncios.tipo, anuncios.dataDev, anuncios.preco, anuncios.data, anuncios.idLivro, usuarios.nome, anuncios.idUsuario
								FROM anuncios INNER JOIN usuarios
								ON anuncios.idUsuario = usuarios.id

								WHERE idLivro = ?
								ORDER BY tipo', [$livro]);

		$revisoes = DB::select('
									SELECT a.id, a.texto, a.nome, a.data, COALESCE(b.media, 0) AS media FROM
										(SELECT revisoes.id, revisoes.texto, usuarios.nome, revisoes.data
										FROM revisoes
										LEFT JOIN usuarios
										ON revisoes.idUsuario=usuarios.id
										WHERE revisoes.idLivro = ?) AS a
									LEFT JOIN
										(SELECT idRevisao, TRUNCATE(5 * SUM(nota = 1)/COUNT(*),0)+1
										AS media
										FROM usuarios_revisoes
										GROUP BY idRevisao) AS b
									ON b.idRevisao = a.id', [$livro]
								);
		
		$categorias = DB::select('SELECT categorias.nome
							FROM categorias
							INNER JOIN categorias_livros
							ON categorias.id=categorias_livros.idCategoria
							WHERE categorias_livros.idLivro = ?', [$livro]);

		$cores = json_decode(json_encode(['33cc33', '3399ff', 'ffcc00']));
		return view('pages.livroindex', [
			'livro'   	=> $getlivro,
			'revisoes'	=> $revisoes,
			'anuncios'	=> $anuncios,
			'categorias' => $categorias,
			'cores'   	=> $cores
		]);
	}

	public function store(Request $request)
	{	

		$this->validate($request,[
			'titulo' => 'required|min:5',
			'isbn' => 'required|numeric',
			'idioma' => 'required|alpha',
			'autor' => 'required',
			'sumario' => 'required|min:5',
			'data' => 'required|numeric|min:8'
		]);
		
		DB::insert('INSERT INTO livros (titulo, isbn, idioma, autor, sumario, lancamento) VALUES (?, ?, ?, ?, ?, ?)', [$request->titulo, $request->isbn, $request->idioma, $request->autor, $request->sumario, $request->data]);

	 	$idCategorias = $request->input('categorias');
	 	$numCategoriasSelect = count($idCategorias);
	 	$idLivro = DB::table('livros')->max('id'); // Equivalente ao codigo SQL: 'SELECT MAX(id) FROM livros'

	 	//echo $numCategoriasSelect;
	 	for($x = 0; $x < $numCategoriasSelect; $x++) {
    		DB::insert('INSERT INTO categorias_livros (idCategoria, idLivro) VALUES (?, ?)', [intval($idCategorias[$x]), intval($idLivro)]);
		}		
	 	
	 	//DB::insert('INSERT INTO categorias_livros (idCategoria, idLivro) VALUES (?, ?)', [intval($idCategoria), intval($idLivro)]);
		//return $idCategorias->all();	 	
	 	//return $request->all();
	 
	 	return back();
	}
	public function delete($livro)
	{
		DB::delete('DELETE FROM livros WHERE id = ?', [$livro]);
		return back();
	}
	
}