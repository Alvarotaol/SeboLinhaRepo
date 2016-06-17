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
			'usuarios'	=> $usuarios,
			'pagename'	=> $pagename
		]);
	}

	public function update(Request $request, $id)
	{

		$this->validate($request,[
			'nome' => 'required',
			'email' => 'required',
			'cpf' => 'required|min:11'
		]);
		$request->session()->flash('alert-success', 'Informações atualizadas com sucesso.');
		DB::insert('
					UPDATE usuarios
					SET nome = ?, email = ?, cpf = ?, endereco = ?, cidade = ?, estado = ?
					WHERE id = ?
					',[$request->nome, $request->email, $request->cpf, $request->endereco, $request->cidade, $request->estado, $id]);
		return back();
	}

	public function showedit($usuarioid)
	{
		$usuario = DB::select('select * from usuarios where id = ?', [$usuarioid])[0];
		return view('pages.edituser', [
			'usuario'	=> $usuario,
		]);
	}

	public function show($usuario)
	{
		$getusuario = DB::select('select * from usuarios where id = ?', [$usuario])[0];
		$anuncios = DB::select('SELECT anuncios.tipo, anuncios.dataDev, anuncios.preco, anuncios.data, anuncios.idLivro, livros.titulo
								FROM anuncios INNER JOIN usuarios
								ON anuncios.idUsuario = usuarios.id
								INNER JOIN livros ON anuncios.idLivro = livros.id
								WHERE idUsuario = ?
								ORDER BY tipo', [$usuario]); 
		$cores = json_decode(json_encode(['33cc33', '3399ff', 'ffcc00']));
		$pagename = 'Lista de usuarios';
		return view('pages.usuarioindex', [
			'usuario' 	=> $getusuario,
			'anuncios'	=> $anuncios,
			'cores'   	=> $cores
		]);
	}

	public function create()
	{	
		
	}
	public function delete()
	{
	
	}
	
}
