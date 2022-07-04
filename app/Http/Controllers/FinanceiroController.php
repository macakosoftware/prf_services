<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Financeiro;
use App\Models\Selecao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use PhpParser\ErrorHandler\Throwing;
use Throwable;

class FinanceiroController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listarTodos(){
        $financeiros = Financeiro::all();

        foreach($financeiros as $financeiro){
            $financeiro['ds_tipo_movto'] = Financeiro::getDsTipoMovimento($financeiro['tp_movimento']);
            $financeiro['ds_forma_pagto'] = Financeiro::getDsFormaPagto($financeiro['cd_forma_pagto']);
        }

        return $financeiros->toJson();
    }

    public function dadosID($id){

        $financeiro = Financeiro::where('id', $id)->get()->toJson();
        
        return $financeiro;
    }

    public function deletarID($id): JsonResponse{
        try{
            $res = Financeiro::where('id',$id)->delete();
            if (!$res){
                return response()->json([
                    'error' => [
                        'description' => 'Item não localizado. Id Informado '.$id.', favor verificar!'
                    ]
                ], 490);
            }            

        }catch(Throwable $e){
            return response()->json([
                'error' => [
                    'description' => $e->getMessage()
                ]
            ], 500);
        }
        
        return response()->json([
            'message' => 'Item deletado com sucesso!'
        ], 200);
    }

    public function salvarFinanceiro(Request $request): JsonResponse{
        try{
            $financeiro = new Financeiro();
            $financeiro->ds_titulo = $request->json()->get('ds_titulo');
            if (trim($financeiro->ds_titulo) == ''){
                return response()->json([
                    'error' => [
                        'description' => 'Título não informado!'
                    ]
                ], 402);
            }
            $financeiro->ds_comentario = $request->json()->get('ds_comentario');
            $financeiro->vl_movimento = $request->json()->get('vl_movimento');
            $financeiro->dt_movimento = Carbon::createFromFormat('d/m/Y', $request->json()->get('dt_movimento'))->format('Y-m-d');
            $financeiro->dt_referencia = Carbon::createFromFormat('d/m/Y', $request->json()->get('dt_referencia'))->format('Y-m-d');
            $financeiro->tp_movimento = $request->json()->get('tp_movimento');
            $financeiro->cd_forma_pagto = $request->json()->get('cd_forma_pagto');
            $financeiro->save();
            
            return response()->json($financeiro);
        }
        catch (Throwable $e){
            return response()->json([
                'error' => [
                    'description' => $e->getMessage()
                ]
            ], 500);
        }        
    }

    public function atualizarFinanceiro(Request $request): JsonResponse{
        try{
            $financeiro = Financeiro::where('id', $request->json->get('id'));
            if ($financeiro == null){
                return response()->json([
                    'error' => [
                        'description' => 'Movimento do Financeiro não encontrado!'
                    ]
                ], 401);
            }
            $financeiro->ds_titulo = $request->json()->get('ds_titulo');
            if (trim($financeiro->ds_titulo) == ''){
                return response()->json([
                    'error' => [
                        'description' => 'Título não informado!'
                    ]
                ], 500);
            }
            $financeiro->ds_comentario = $request->json()->get('ds_comentario');
            $financeiro->vl_movimento = $request->json()->get('vl_movimento');
            $financeiro->dt_movimento = Carbon::createFromFormat('d/m/Y', $request->json()->get('dt_movimento'))->format('Y-m-d');
            $financeiro->dt_referencia = Carbon::createFromFormat('d/m/Y', $request->json()->get('dt_referencia'))->format('Y-m-d');
            $financeiro->tp_movimento = $request->json()->get('tp_movimento');
            $financeiro->cd_forma_pagto = $request->json()->get('cd_forma_pagto');
            $financeiro->save();
            
            return response()->json($financeiro);
        }
        catch (Throwable $e){
            return response()->json([
                'error' => [
                    'description' => $e->getMessage()
                ]
            ], 500);
        }        
    }

    public function listarTodosTipoMovimento(){
        $tb_tipos_movto = array();
        for($i=1;$i<=Financeiro::QTD_TIPO_MOVIMENTO;$i++){
            $tipo_movto['cod'] = $i;
            $tipo_movto['desc'] = Financeiro::getDsTipoMovimento($i);
            $tb_tipos_movto[] = $tipo_movto;
        }

        return json_encode($tb_tipos_movto);
    }

    public function listarTodasFormaPagto(){
        $tb_formas_pagto = array();
        for($i=1;$i<=Financeiro::QTD_FORMA_PAGTO;$i++){
            $tipo_forma['cod'] = $i;
            $tipo_forma['desc'] = Financeiro::getDsFormaPagto($i);
            $tb_tipos_pagto[] = $tipo_forma;
        }

        return json_encode($tb_tipos_pagto);
    }

}