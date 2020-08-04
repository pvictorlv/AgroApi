<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PragasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pragas = ['Insetos', 'Fungos', 'Ervas Daninhas'];
        foreach ($pragas as $praga) {
            DB::table('pragas')->insert([
                'nome' => $praga
            ]);
        }
    }
}
