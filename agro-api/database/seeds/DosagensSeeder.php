<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosagensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosagens')->insert([
            'id' => 1,
            'dosagem' => '100ML por Litro',
            'praga_id' => 1,
            'produto_id' => 1,
            'cultura_id' => 1
        ]);
    }
}
