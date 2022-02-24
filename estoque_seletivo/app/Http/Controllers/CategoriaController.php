<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\User;

class CategoriaController extends Controller
{
    public function index() {
    
        $categorias = Categoria::all();

        return view('categorias.painel', ['categorias' => $categorias]);

    }

    public function create() {
          
        return View('categorias.create');
    }

    public function store(Request $request) {
     
        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        
       
        $categoria->save();


    return redirect('/categorias/painel')->with('mensagem', 'Categoria criada com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }


    public function edit($id) {
       
        $categoria = Categoria::findOrFail($id);

    return view('categorias.edit', ['categoria' => $categoria]); 
    }


    public function update(Request $request) {

        $data = $request->all(); 

        Categoria::findOrFail($request->id)->update($data);
    return redirect('/categorias/painel')->with('mensagem', 'Categoria editada com Sucesso!', ['data' => $data]);
    }

    
    public function painel() {

        $categorias = Categoria::all();

        return View('categorias.painel', ['categorias' => $categorias]); 
    }

    public function destroy($id) {

        Categoria::findOrFail($id)->delete();

    return redirect('/categorias/painel')->with('mensagem', 'Categoria deletada com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }
}
