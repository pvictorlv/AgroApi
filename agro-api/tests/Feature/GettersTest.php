<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use Tymon\JWTAuth\JWTAuth;

class GettersTest extends TestCase
{

    public function testGetDosagens(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/dosagens?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }

    public function testGetCulturas(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/culturas?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }

    public function testGetProdutos(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/produtos?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }

    public function testGetPragas(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/pragas?token=' . $token;

        $response = $this->json('GET', $baseUrl, []);

        $response->assertStatus(200);
    }


}
