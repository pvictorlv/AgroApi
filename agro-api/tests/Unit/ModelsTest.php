<?php

namespace Tests\Unit;

use App\Models\Cultura;
use App\Models\Dosagem;
use App\Models\Praga;
use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ModelsTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        self::assertTrue(true);
        /*
        $pragas = factory(Praga::class, 3)->make();
        $this->assertNotEmpty($pragas);

        $produtos = factory(Produto::class, 3)->make();
        $this->assertNotEmpty($produtos);

        $culturas = factory(Cultura::class, 3)->make();
        $this->assertNotEmpty($culturas);
    */
    }
}
