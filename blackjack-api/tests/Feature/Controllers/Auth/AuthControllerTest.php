<?php

namespace Tests\Feature\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    protected User $authenticatedUser;

    public function setUp(): void
    {
        parent::setUp();

        $this->authenticatedUser = User::where('email', 'test@mail.com')->first();
    }
    public function testSuccessfulLogin(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => $this->authenticatedUser->email,
            'password' => '123456789'
        ]);

        $response->assertOk()
            ->assertJsonStructure([
                'message',
                'token',
                'user' => [
                    'id',
                    'nickname'
                ]
            ]);
    }

    public function testUnsuccessfulLoginWithWrongPassword(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => $this->authenticatedUser->email,
            'password' => 'wrongpassword'
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid credentials'
            ]);
    }

    public function testUnsuccessfulLoginWithNonexistentEmail(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'wrong@mail.com',
            'password' => '123456789'
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'message' => 'Invalid credentials'
            ]);
    }
}
