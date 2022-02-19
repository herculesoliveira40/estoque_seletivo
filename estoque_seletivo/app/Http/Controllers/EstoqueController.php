<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Estoque;
use App\Models\Produto;
use App\Models\User;

class EstoqueController extends Controller
{

    public function index() {
    
        return view('estoques.home');

    }

    public function create() {
     
        return View('estoques.create');
    }

    public function store(Request $request) {
     
        $estoque= new Estoque();
        $estoque->quantidade = $request->quantidade;
        $estoque->produto_id = $request->produto->id;

        $user = auth()->user();
        $estoque->user_id = $user->id;
        
        $estoque->save();


    return redirect('/')->with('mensagem', 'Estoque criado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }
}
