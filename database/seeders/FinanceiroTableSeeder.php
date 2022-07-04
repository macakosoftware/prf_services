<?php

namespace Database\Seeders;

use App\Models\Financeiro;
use Illuminate\Database\Seeder;

class FinanceiroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Financeiro::create([
            'dt_movimento' => '2022-05-01',
            'dt_referencia' => '2022-05-01',
            'ds_titulo' => 'Pagamento de Cachê tche tche tche',
            'ds_comentario' => 'Pagamento do cache do bar to tche tche tche',
            'vl_movimento' => 150.00,
            'tp_movimento' => 1,
            'cd_forma_pagto' => 2
        ]);

        Financeiro::create([
            'dt_movimento' => '2022-04-03',
            'dt_referencia' => '2022-04-01',
            'ds_titulo' => 'Compra de uma echarpe para a banda',
            'ds_comentario' => 'Para a banda ficar quentinha, uma echarpe',
            'vl_movimento' => 35.00,
            'tp_movimento' => 2,
            'cd_forma_pagto' => 1
        ]);

        Financeiro::create([
            'dt_movimento' => '2022-05-10',
            'dt_referencia' => '2022-05-08',
            'ds_titulo' => 'Pagamento de Cachê Bar da Gauchada',
            'ds_comentario' => 'Show no bar da gauchada',
            'vl_movimento' => 300.00,
            'tp_movimento' => 1,
            'cd_forma_pagto' => 3
        ]);

        Financeiro::create([
            'dt_movimento' => '2022-05-22',
            'dt_referencia' => '2022-05-22',
            'ds_titulo' => 'Pagamento de Cachê Festival de Malabares',
            'ds_comentario' => 'Pagamento do cache do festival de malabares',
            'vl_movimento' => 200.00,
            'tp_movimento' => 1,
            'cd_forma_pagto' => 3
        ]);

        Financeiro::create([
            'dt_movimento' => '2022-05-27',
            'dt_referencia' => '2022-05-24',
            'ds_titulo' => 'Compra de polainas de lã',
            'ds_comentario' => 'Estilo é tudo, compra de polainas, estilo bon jovi já!',
            'vl_movimento' => 49.90,
            'tp_movimento' => 2,
            'cd_forma_pagto' => 5
        ]);
             
    }
}
