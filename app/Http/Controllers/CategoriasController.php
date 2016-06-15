<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
//Para os comandos SQL """"Puros""""
use DB;
class CategoriasController extends Controller
{
	//
	public function index()
	{
		$categorias = DB::select('select * from categorias');
		$pagename = 'Lista de categorias';
		return view('pages.categorias', [
			'categorias'  	=> $categorias,
			'pagename'	=> $pagename
		]);
	}
	public function show($categoria)
	{
		$getcategoria = DB::select('select * from categorias where id = ?', [$categoria]);
		return view('pages.categoriaindex', [
			'categorias'	=> $getcategoria
		]);
	}
	public function store(Request $request)
	{	
	 	//return $request->all();
	 	DB::insert('INSERT INTO categorias (nome) VALUES (?)', [$request->nome]);
	 	return back();
	}
	public function delete($categoria)
	{
		DB::delete('DELETE FROM categorias WHERE id = ?', [$categoria]);
		return back();
	}	
}