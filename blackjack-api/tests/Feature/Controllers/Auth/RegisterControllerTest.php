<?php

namespace Tests\Feature\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;

class RegisterControllerTest extends TestCase
{
    protected User $authenticatedUser;

    public function setUp(): void
    {
        parent::setUp();

        $this->authenticatedUser = User::where('email', 'test@mail.com')->first();
    }

    public function testSuccessfulRegistration(): void
    {
        $payload = [
            'nickname' => 'newUser',
            'email' => 'new@mail.com',
            'password' => 'password123'
        ];

        $response = $this->postJson('/api/players', $payload);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'uuid'
            ]);

        $this->assertDatabaseHas('users', [
            'nickname' => $payload['nickname'],
            'email' => $payload['email']
        ]);
    }

    public function testEmailAlreadyInUse(): void
    {
        $response = $this->postJson('/api/players', [
            'nickname' => 'newUser',
            'email' => $this->authenticatedUser->email,
            'password' => 'password123'
        ]);

        $response->assertStatus(422)
            ->assertJsonStructure(['message']);
    }

    public function testNicknameAlreadyInUse(): void
    {
        $response = $this->postJson('/api/players', [
            'nickname' => $this->authenticatedUser->nickname,
            'email' => 'another@mail.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(422)
            ->assertJsonStructure(['message']);
    }

    public function testAnonymousNickname(): void
    {
        $response = $this->postJson('/api/players', [
            'email' => 'anonymous@mail.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'nickname' => 'Anonymous',
            'email' => 'anonymous@mail.com'
        ]);
    }
}
