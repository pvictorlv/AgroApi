<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CulturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $culturas = ['Arroz', 'Milho', 'Soja', 'Trigo'];
        foreach ($culturas as $cultura) {
            DB::table('culturas')->insert([
                'nome' => $cultura
            ]);
        }
    }
}
