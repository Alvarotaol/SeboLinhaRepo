<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//Para os comandos SQL """"Puros""""
use DB;

class UsuarioController extends Controller
{
	//
	public function index()
	{
		$usuarios = DB::select('select * from usuarios');
		$pagename = 'Lista de usuarios';
		return view('pages.usuarios', [
			'usuarios'  	=> $usuarios,
			'pagename'	=> $pagename
		]);
	}

	public function show($usuario)
	{
		$getusuario = DB::select('select * from usuarios where id = ?', [$usuario])[0];

		$pagename = 'Lista de usuarios';
		return view('pages.usuarioindex', [
			'usuario'	=> $getusuario
		]);
	}

	public function create()
	{	
		
	}
	public function delete()
	{
	
	}
	
}
