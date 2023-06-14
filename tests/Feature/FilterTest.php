<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class FilterTest extends TestCase
{
    use RefreshDatabase;


    public function test_filter_by_name(): void
    {
        $users = User::factory()->count(5)->create();
        $userToFilter = $users->random();
        $userlogin = User::factory()->create();
        
        $this->actingAs($userlogin);
        
        $response = $this->get(route('users.filter', ['search' => $userToFilter->name]));
        $filteredUsers = User::where('name', 'like', "%{$userToFilter->name}%")->get();

        $response->assertViewHas('users', $filteredUsers);
    }

    public function test_filter_by_email(): void
    {
        $users = User::factory()->count(5)->create();
        $userToFilter = $users->random();
        $userlogin = User::factory()->create();
        
        $this->actingAs($userlogin);
        
        $response = $this->get(route('users.filter', ['search' => $userToFilter->email]));
        $filteredUsers = User::where('email', 'like', "%{$userToFilter->email}%")->get();

        $response->assertViewHas('users', $filteredUsers);
    }
}
