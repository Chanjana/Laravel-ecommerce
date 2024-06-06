<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_admin_can_view_dashboard(): void
    {
        $this->seed(DatabaseSeeder::class);

        $user = User::where('role', Role::SuperAdministrator->value)
            ->inRandomOrder()
            ->limit(1)
            ->first();

        $this->actingAs($user);

        $response = $this->get(route('filament.admin.pages.dashboard'));

        $response->assertStatus(200);
    }
}
