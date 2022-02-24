<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use Illuminate\Support\Facades\DB;
use PDF;


class HistoricoController extends Controller
{
    public function gerarPdf(){
        $estoques = DB::table('estoques')

        ->distinct('estoques.produto_id') 
        ->orderByRaw('created_at DESC')
    
        
        ->join('produtos', 'estoques.produto_id', '=', 'produtos.id')
        ->join('users', 'estoques.user_id', '=', 'users.id')
        ->select('estoques.id','produtos.nome', 'users.name', 'estoques.quantidade_movimentada', 'estoques.created_at', 'estoques.status' )
        ->get();

        //dd($estoques);

        $pdf = PDF::loadView('historicos.relatorio', compact('estoques'));

        return $pdf->setPaper('a4')->stream('Relatorio_geral_estoque.pdf');

    }
}
