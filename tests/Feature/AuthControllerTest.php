<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccessfulLogin()
    {
        // arrange
        $user = User::factory()->create([
            'email' => 'test@example.com', 
            'password' => Hash::make('password')
        ]);

        // act
        $response = $this->postJson('api/v1/auth/access-tokens', [
            'email' => 'test@example.com', 
            'password' => 'password', 
            'device_name' => 'TestDevice'
        ]);

        // assert 
        $response->assertStatus(201);

        $this->assertNotNull($response['token']);
        $this->assertEquals($user->id, $response['user']['id']);
    }
}
