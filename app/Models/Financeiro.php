<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    public const QTD_TIPO_MOVIMENTO = 2;
	public const TIPO_MOVIMENTO_ENTRADA = 1;
	public const TIPO_MOVIMENTO_SAIDA = 2;

    public const QTD_FORMA_PAGTO = 6;
    public const FORMA_PAGTO_DINHEIRO = 1;
    public const FORMA_PAGTO_TED = 2;
    public const FORMA_PAGTO_PIX = 3;
    public const FORMA_PAGTO_CARTAO_CRED_VISTA = 4;
    public const FORMA_PAGTO_CARTAO_CRED_PRAZO = 5;
    public const FORMA_PAGTO_CARTAO_DEB = 6;
	
    protected $table = 'financeiro';
 
    protected $fillable = [
        'dt_movimento', 'dt_referencia', 'ds_titulo', 'ds_comentario', 'vl_movimento', 'tp_movimento', 'cd_forma_pagto'
    ];
   
    public static function getDsTipoMovimento($cd_tipo_movto){
        $ds_tipo_movto = '';

        switch ($cd_tipo_movto){
            case Financeiro::TIPO_MOVIMENTO_ENTRADA:
                $ds_tipo_movto = 'Entrada';
                break;
            case Financeiro::TIPO_MOVIMENTO_SAIDA:
                $ds_tipo_movto = 'Saida';
                break;
        }

        return $ds_tipo_movto;
    }

    public static function getDsFormaPagto($cd_forma_pagto){
        $ds_forma_pagto = '';

        switch ($cd_forma_pagto){
            case Financeiro::FORMA_PAGTO_DINHEIRO:
                $ds_forma_pagto = 'Dinheiro';
                break;
            case Financeiro::FORMA_PAGTO_TED:
                $ds_forma_pagto = 'TED';
                break;
            case Financeiro::FORMA_PAGTO_PIX:
                $ds_forma_pagto = 'PIX';
                break;
            case Financeiro::FORMA_PAGTO_CARTAO_CRED_VISTA:
                $ds_forma_pagto = 'Cartão de Crédito a Vista';
                break;
            case Financeiro::FORMA_PAGTO_CARTAO_CRED_PRAZO:
                $ds_forma_pagto = 'Cartão de Crédito a Prazo';
                break;
            case Financeiro::FORMA_PAGTO_CARTAO_DEB:
                $ds_forma_pagto = 'Cartão de Débito';
                break;
        }

        return $ds_forma_pagto;
    }
}
