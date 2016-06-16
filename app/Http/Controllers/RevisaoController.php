<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use Auth;

use DB;

class RevisaoController extends Controller
{
    //
	public function show($livro)
	{
		$revisoes = DB::select(' SELECT revisoes.texto, usuarios.nome, revisoes.data
							FROM revisoes
							INNER JOIN usuarios
							ON revisoes.idUsuario=usuarios.id
							WHERE revisoes.id = ?', [$livro]);

		//$rev = DB::statement('revisoes')
		//				->join('usuarios', 'revisoes.idUsuario', '=', 'usuarios.id')
		//				->select('revisoes.*',)

		return view('pages.livroindex', [
			'revisoes'	=> $revisoes
		]);
	}

	public function store(Request $request)
	{	
	 	//return $request->all();
	 	$time = Carbon::now();
	 	DB::insert('INSERT INTO revisoes (texto, data, idUsuario, idLivro) VALUES (?, ?, ?, ?)', [$request->texto, $time,intval($request->idUsuario), intval($request->idLivro)]);
	 	return back();
	}

	public function rate(Request $request, $id)
	{	
	 	//return $request->all();
	 	//$time = Carbon::now();
	 	DB::insert('INSERT INTO usuarios_revisoes (nota, idUsuario, idRevisao) VALUES (?, ?, ?)', [$request->nota, Auth::user()->id, $id]);
	 	return back();
	}
}
