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
		$query='select * from livros where';
		$para = 0;
		if ($request->titulo != ''){
			$query .= ' titulo like "%' . $request->titulo . '%"';
			$para += 1;
		}
		if ($request->autor != ''){
			if ($para > 0 ) $query .= " and";
			$query .= ' autor like "%' . $request->autor . '%"';
			$para += 1;
		}
		if ($request->idioma != ''){
			if ($para > 0 ) $query .= " and";
			$query .= ' idioma like "%' . $request->idioma . '%"';
			$para += 1;
		}

		/*if ($request->av == '1') {
			$query = str_replace('?', $request->titulo, 'select * from livros where titulo like "%?%"');
		} else {
			$query = str_replace('?', $request->titulo, 'select * from livros where titulo like "%?%"');
		}*/
		//return $query;
		$resultados = DB::select($query);
		return view('pages.buscaindex', [
			'resultados' => $resultados,
			'termosbusca' => $request
		]);
	}


}
