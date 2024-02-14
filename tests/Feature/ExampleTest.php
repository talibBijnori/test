<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_user_can_login_and_generate_token()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'user@gmail.com',
            'password' => '123456',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['success', 'token']);
    }
    public function test_authenticated_user_can_retrieve_data()
    {
        $loginResponse = $this->postJson('/api/login', [
            'email' => 'user@gmail.com',
            'password' => '123456',
        ]);
        $token = $loginResponse->json()['token'];
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/showData');

        $response->assertStatus(200)
            ->assertJsonStructure(['success', 'randVal']);
    }
}
