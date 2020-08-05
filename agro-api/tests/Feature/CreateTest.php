<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use Tymon\JWTAuth\JWTAuth;

class CreateTest extends TestCase
{

    public function testCreateDosagens(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/dosagens?token=' . $token;

        $response = $this->json('POST', $baseUrl, ['praga' => 2, 'cultura' => 2, 'produto' => 2, 'dosagem' => uniqid('rand-', true)]);
        $response->assertStatus(201);

        $baseUrl = Config::get('app.url') . '/api/dosagens/' . $response->decodeResponseJson('id') . '?token=' . $token;

        $response = $this->json('PUT', $baseUrl, ['praga' => 2, 'cultura' => 2, 'produto' => 1, 'dosagem' => uniqid('rand-', true)]);
        $response->assertStatus(200);

        $response = $this->json('DELETE', $baseUrl, []);
        $response->assertStatus(200);
    }

    public function testCreateCulturas(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/culturas?token=' . $token;

        $response = $this->json('POST', $baseUrl, ['nome' => uniqid('rand-', true)]);
        $response->assertStatus(201);

        $baseUrl = Config::get('app.url') . '/api/culturas/' . $response->decodeResponseJson('id') . '?token=' . $token;

        $response = $this->json('PUT', $baseUrl, ['nome' => uniqid('rand-', true)]);
        $response->assertStatus(200);

        $response = $this->json('DELETE', $baseUrl, []);
        $response->assertStatus(200);
    }

    public function testCreateProdutos(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/produtos?token=' . $token;

        $response = $this->json('POST', $baseUrl, ['nome' => uniqid('rand-', true)]);
        $response->assertStatus(201);

        $baseUrl = Config::get('app.url') . '/api/produtos/' . $response->decodeResponseJson('id') . '?token=' . $token;
        $response = $this->json('PUT', $baseUrl, ['nome' => uniqid('rand-', true)]);
        $response->assertStatus(200);

        $response = $this->json('DELETE', $baseUrl, []);
        $response->assertStatus(200);
    }

    public function testCreatePragas(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/pragas?token=' . $token;

        $response = $this->json('POST', $baseUrl, ['nome' => uniqid('rand-', true)]);
        $response->assertStatus(201);

        $baseUrl = Config::get('app.url') . '/api/pragas/' . $response->decodeResponseJson('id') . '?token=' . $token;
        $response = $this->json('PUT', $baseUrl, ['nome' => uniqid('rand-', true)]);
        $response->assertStatus(200);

        $response = $this->json('DELETE', $baseUrl, []);
        $response->assertStatus(200);
    }


}
