<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CulturasSeeder::class);
        $this->call(ProdutosSeeder::class);
        $this->call(PragasSeeder::class);
    }
}
