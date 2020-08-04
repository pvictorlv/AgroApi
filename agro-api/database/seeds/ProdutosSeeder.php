<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $produtos = ['IMUNIT', 'Opera', 'Basagran 600'];
        foreach ($produtos as $produto) {
            DB::table('produtos')->insert([
                'nome' => $produto
            ]);
        }
    }
}
