<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class SessionTest extends TestCase
{
    /**
     * Teste login
     * @return void
     */
    public function testLogin(): void
    {
        $baseUrl = Config::get('app.url') . '/api/auth/login';
        $email = 'admin@admin.com';
        $password = 'admin123';

        $response = $this->json('POST', $baseUrl, [
            'email' => $email,
            'senha' => $password
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }

    /**
     * Teste atualizar token.
     *
     * @return void
     */
    public function testRefresh(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);
        $baseUrl = config()->get('app.url') . '/api/auth/refresh?token=' . $token;

        $response = $this->json('POST', $baseUrl, []);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }

    /**
     * Teste logout
     * @return void
     */
    public function testLogout(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);
        $baseUrl = config()->get('app.url') . '/api/auth/logout?token=' . $token;

        $response = $this->json('POST', $baseUrl, []);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'message' => 'Deslogado com sucesso!'
            ]);
    }

}
