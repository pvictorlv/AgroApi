<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        DB::table('usuarios')->insert([
            'email' => 'admin@admin.com',
            'senha' => bcrypt('admin123'),
            'nome' => 'admin'
        ]);

        factory(App\Models\Usuario::class, 5)->create();
    }
}
