<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use Tymon\JWTAuth\JWTAuth;

class DosagensTest extends TestCase
{
    /**
     * Get all users.
     *
     * @return void
     */
    public function testGetDosagens(): void
    {
        $user = Usuario::where('email', '=', 'admin@admin.com')->first();
        $token = auth()->fromUser($user);

        $baseUrl = Config::get('app.url') . '/api/dosagens?token=' . $token;

        $response = $this->json('GET', $baseUrl . '/', []);

        $response->assertStatus(200);
    }


}
