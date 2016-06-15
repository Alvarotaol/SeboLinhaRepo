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
		//$resultados = DB::select('select * from livros where titulo like "%?%"', [$request->busca]);
		$resultados = DB::select('select * from livros');
		return $resultados;
	}


}
