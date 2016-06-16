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
