<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;
use App\Models\User;

class ProdutoController extends Controller
{
    public function index() {
        $search = request('search');

        if($search) {

            $produtos = Produto::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $produtos = Produto::all();
        }        
    
        return view('home',['produtos' => $produtos, 'search' => $search]);

    }


    public function create() {
     
        return View('produtos.create');
    }

    public function store(Request $request) {
     
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->fabricante = $request->fabricante;
        $produto->modelo = $request->modelo;
        $produto->cor = $request->cor;
        $produto->sku = $request->categoria.$request->fabricante.$request->modelo.$request->cor; //SKUUUUUUU
        $produto->valor = $request->valor;
        $produto->descricao = $request->descricao;
        $produto->imagem = $request->imagem;
        $produto->data_fabricacao = $request->data_fabricacao;
        $produto->data_vencimento = $request->data_vencimento;
        $produto->categoria = $request->categoria;
        $produto->disponivel = $request->disponivel;

        // Image Upload
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/produtos'), $imageName);

            $produto->imagem = $imageName;

        }
        
        $user = auth()->user();
        $produto->user_id = $user->id;
        $produto->save();


    return redirect('/')->with('mensagem', 'Produto criado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }


    public function show($id) {

        $produto = Produto::findOrFail($id);
       
    return view('produtos.show', ['produto' => $produto]);    
    }

    
    public function edit($id) {

        $produto = Produto::findOrFail($id);

    return view('produtos.edit', ['produto' => $produto]); 
    }

    public function update(Request $request) {

        $data = $request->all(); 

        // Image Upload
    if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/produtos'), $imageName);

        $data['imagem'] = $imageName;

    }

        Produto::findOrFail($request->id)->update($data);
    return redirect('/produtos/painel')->with('mensagem', 'Produto editado com Sucesso!', ['data' => $data]);
    }

    
    public function painel() {
        $user = auth()->user();
        $produtos = $user->produtos;

        return View('produtos.painel', ['produtos' => $produtos]);
    }

    public function destroy($id) {

        Produto::findOrFail($id)->delete();

    return redirect('/produtos/painel')->with('mensagem', 'Produto deletado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }

 


}
