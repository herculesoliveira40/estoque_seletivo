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
        $produtos = Produto::all();
        
        return View('estoques.create', compact($produtos));
    }

    public function store(Request $request) {
     
        $estoque= new Estoque();
        $estoque->quantidade = $request->quantidade;
        $estoque->produto_id =  $request->produto_id;
        

        $user = auth()->user();
        $estoque->user_id = $user->id;
        
        $estoque->save();


    return redirect('/')->with('mensagem', 'Estoque criado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }


    public function edit($id) {

        $estoque = Estoque::findOrFail($id);

    return view('estoques.edit', ['estoque' => $estoque]); 
    }


    public function update(Request $request) {

        $data = $request->all(); 

        Estoque::findOrFail($request->id)->update($data);
    return redirect('/estoques/painel')->with('mensagem', 'Estoque editado com Sucesso!', ['data' => $data]);
    }

    
    public function painel() {
        $user = auth()->user();
        $estoques = $user->estoques;

        return View('estoques.painel', ['estoques' => $estoques]);
    }

    public function destroy($id) {

        Estoque::findOrFail($id)->delete();

    return redirect('/estoques/painel')->with('mensagem', 'Estoque deletado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }
}
