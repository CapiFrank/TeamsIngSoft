<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
class CreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create(): void
    {
        $user = User::factory()->make();
        var_dump($user);
        $response = $this->post(route('users.create'), $user->toArray());
    
        $response->assertRedirect();
    
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
            'name' => $user->name,
            'job' => $user->job,
        ]);
    }
    
}
