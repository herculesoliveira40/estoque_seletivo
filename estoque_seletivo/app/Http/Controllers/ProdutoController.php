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
        $produto->sku = $request->sku;
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
}
