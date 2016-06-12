<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LayoutController extends Controller
{
	public function home()
	{
		$coragem = 'teste 1';
		$yuuki = "teste 2 ";
		$brave = "teste 3 ";
		
		return view('layout', [
			'coragem'	=> $coragem,
			'yuuki'  	=> $yuuki,
			'brave'  	=> $brave
		]);
	}

}
