<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

//Para os comandos SQL """"Puros""""
use DB;

class BuscaController extends Controller
{
	//
	public function buscar(Request $request)
	{
		$query = str_replace('?', $request->busca, 'select * from livros where titulo like "%?%"');
		//$resultados = DB::select('select * from livros where titulo like "%?%"', [$request->busca]);
		$resultados = DB::select($query);
		return view('pages.buscaindex', [
			'resultados' => $resultados
		]);
	}


}
