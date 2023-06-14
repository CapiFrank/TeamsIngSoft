<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase; // Utiliza la base de datos en memoria para las pruebas

    public function test_delete_user()
    {
        /* // Crea un usuario de ejemplo en la base de datos
        $user = User::factory()->create();

        // Simula una solicitud DELETE a la ruta de eliminación del usuario
        $response = $this->delete(route('users.destroy', ['user' => $user->id])); */

        $user = User::factory()->create();
        $response =  $this->actingAs($user)->delete(route('users.destroy', ['user' => $user->id]));


        // Verifica que el usuario haya sido eliminado correctamente
        $this->assertDatabaseMissing('users', ['id' => $user->id]);

        // Verifica que se haya redirigido a la página de usuarios después de la eliminación
        $response->assertRedirect(route('users.index'));
    }
}