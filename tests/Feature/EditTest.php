<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class EditTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_edit(): void
    {
        $userlogin = User::factory()->create();
        $this->actingAs($userlogin);
        
        $user = User::factory()->create();
        $edit = User::factory()->make();

        $response = $this->put(route('users.update', $user->id), $edit->toArray());
        $response->assertRedirect(route('users.index'));
    
        $this->assertDatabaseHas('users', [
            'email' => $edit->email,
            'name' => $edit->name,
            'job' => $edit->job,
        ]);
    }

    public function test_update(): void
    {
        $userlogin = User::factory()->create();
        $this->actingAs($userlogin);
        
        $user = User::factory()->create();
        $response = $this->get(route('users.edit', $user->id));
        $response->assertViewHas('user',$user);
    }
}
