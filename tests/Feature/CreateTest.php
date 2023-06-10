<?php

namespace Tests\Feature;

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
        $userlogin = User::factory()->create();

        $this->actingAs($userlogin);
        $user = User::factory()->make();
        $data = $user->toArray();
        $data['password'] = $user->password;
        $response = $this->post(route('users.create'), $data);
        $response->assertRedirect(route('users.index'));
    
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
            'name' => $user->name,
            'job' => $user->job,
        ]);
    }
    
}
