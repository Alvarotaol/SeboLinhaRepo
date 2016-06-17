<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Auth;

class DenunciaController extends Controller
{
    public function show($usuario)
    {
		return view('pages.usuariodenuncia',[
			'usuario' => $usuario
		]);
    }

    public function list()
    {
		$denuncias = DB::select('SELECT * FROM
					(SELECT denuncias.reclamacao, usuarios.nome, denuncias.idDenunciante, denuncias.idDenunciado 
					FROM denuncias LEFT JOIN usuarios
					ON denuncias.idDenunciante = usuarios.id) AS a
					LEFT JOIN
					(SELECT usuarios.nome AS dnome, usuarios.id
					FROM usuarios) as b
					ON a.idDenunciado = b.id
					');
		return view('pages.denuncias',[
			'denuncias'	=> $denuncias
		]);
    }

    public function denunciar(Request $request, $usuario)
    {	
     	$this->validate($request,[
     		'motivo' => 'required|min:25' 
     		]);

		DB::insert('
			INSERT INTO denuncias (reclamacao, idDenunciante, idDenunciado)
			VALUES (?, ?, ?)

			',[$request->motivo, Auth::user()->id, $usuario]);

		$request->session()->flash('alert-success', 'Usuário denunciado.');
		return view('pages.usuariodenuncia',[
			'usuario' => $usuario
		]);
    }
    
}
