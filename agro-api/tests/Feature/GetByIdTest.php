<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use Tymon\JWTAuth\JWTAuth;

class GetByIdTest extends TestCase
{

    public function testGetIdDosagens(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/dosagens/1?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }

    public function testGetIdCulturas(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/culturas/1?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }

    public function testGetIdProdutos(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/produtos/1?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }

    public function testGetIdPragas(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/pragas/1?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }


}
