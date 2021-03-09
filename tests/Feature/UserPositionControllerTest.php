<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserPosition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserPositionControllerTest extends TestCase
{
    use WithFaker;

    public function testIndexResponse() {
        $user = User::factory()->create();
        Sanctum::actingAs(
            $user,
            ['*']
        );
        $response = $this->getJson('/api/v1/user-position');
        $response
            ->assertStatus(200);
    }

    public function testStoreResponse() {
        $user = User::factory()->create();
        Sanctum::actingAs(
            $user,
            ['*']
        );
        $inputs = [
            'user_id' => $user->id,
            'position' => $this->faker->jobTitle,
            'status' => rand(0, 1) ? 'active' : 'inactive'
        ];
        $response = $this
            ->postJson('/api/v1/user-position', $inputs);
        $response
            ->assertStatus(200);
        $user->delete();
    }

    public function testShowResponse() {
        $user = User::factory()
            ->has(UserPosition::factory()->count(1), 'position')
            ->create();
        Sanctum::actingAs(
            $user,
            ['*']
        );
        $response = $this->getJson('/api/v1/user-position/'.$user->position->id);
        $response
            ->assertStatus(200);
        $user->delete();

    }

    public function testUpdateResponse() {
        $user = User::factory()
            ->has(UserPosition::factory()->count(1), 'position')
            ->create();
        Sanctum::actingAs(
            $user,
            ['*']
        );
        $inputs = [
            'position' => $this->faker->jobTitle,
            'status' => rand(0, 1) ? 'active' : 'inactive'
        ];
        $response = $this->putJson('/api/v1/user-position/'.$user->position->id, $inputs);
        $response
            ->assertStatus(200);
        $user->delete();
    }

    public function testDeleteResponse() {
        $user = User::factory()
            ->has(UserPosition::factory()->count(1), 'position')
            ->create();
        Sanctum::actingAs(
            $user,
            ['*']
        );

        $response = $this->deleteJson('/api/v1/user-position/'.$user->position->id);
        $response
            ->assertStatus(200);
    }
}
