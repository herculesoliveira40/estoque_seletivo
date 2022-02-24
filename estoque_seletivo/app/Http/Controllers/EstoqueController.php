<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Estoque;
use App\Models\Produto;
use App\Models\User;

class EstoqueController extends Controller
{

    public function index() {
    
        return view('estoques.home');

    }

    public function viewRelatorio() {
    

        $historicos = DB::statement(" CREATE VIEW estoque_movimentacoes 
            AS
                SELECT DISTINCT(produtos.nome) as 'Produto', produtos.valor as 'R$', 
                estoques.produto_quantidade_anterior as 'QTD Inicial',
                sum(estoques.produto_quantidade - estoques.produto_quantidade_anterior) as 'QTD movimentada dia', 
                sum(estoques.produto_quantidade - estoques.produto_quantidade_anterior)* produtos.valor as 'Valor total',
                date_format(estoques.created_at, '%d/%m/%Y')  as 'Data' FROM estoques 
                inner join produtos on produtos.id = estoques.produto_id group by produtos.nome, date(estoques.created_at)
                ORDER BY data DESC;
                        
            ");

        return view('estoques.view', ['historicos' => $historicos]);

    }

    public function historico() {

        $estoques = DB::table('estoques')

        ->distinct('estoques.produto_id') 
        ->orderByRaw('created_at DESC')
        
        ->limit(100)
        
        ->join('produtos', 'estoques.produto_id', '=', 'produtos.id')
        ->select('estoques.id','produtos.nome', 'estoques.quantidade_movimentada', 'estoques.created_at', 'estoques.status', )
        ->get();
        
        // dd($estoques);

        return View('estoques.historico', ['estoques' => $estoques]);
    }

    public function store(Request $request) {
     
        $estoque= new Estoque();
        $estoque->quantidade = $request->quantidade;
        $estoque->produto_id =  $request->produto_id;
        

        $user = auth()->user();
        $estoque->user_id = $user->id;
        
        $estoque->save();


    return redirect('/estoques/painel')->with('mensagem', 'Estoque criado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }


    public function edit($id) {
        $produtos = Produto::all();
        $estoque = Estoque::findOrFail($id);

    return view('estoques.edit', ['estoque' => $estoque], compact('produtos')); 
    }


    public function update(Request $request) {

        $data = $request->all(); 

        Estoque::findOrFail($request->id)->update($data);
    return redirect('/estoques/painel')->with('mensagem', 'Estoque editado com Sucesso!', ['data' => $data]);
    }

    
    public function painel() {
        // $user = auth()->user();
        // $estoques = $user->estoques; // Estoque do user->id
        $produtos = Produto::all();
        $estoques = DB::table('estoques')

        ->orderByRaw('created_at DESC')   
        ->join('produtos', 'estoques.produto_id', '=', 'produtos.id')
        ->select('estoques.id', 'estoques.produto_id', 'estoques.produto_quantidade', 'estoques.produto_quantidade_anterior', 
        'produtos.nome', 'estoques.quantidade_movimentada', 'estoques.created_at', 'estoques.status')
        ->get();

        return View('estoques.painel', ['estoques' => $estoques], compact('produtos')); 
    }

    public function destroy($id) {

        Estoque::findOrFail($id)->delete();

    return redirect('/estoques/painel')->with('mensagem', 'Estoque deletado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }
}
