<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{

  public function index(){
    $data['titulo'] = "Minha Pagina de contato. ";
    return view('contato', $data);

  }
}
