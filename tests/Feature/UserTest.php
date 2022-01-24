<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test users can be created and stored in database.
     *
     * @return void
     */
    public function test_can_store_users()
    {
        $name = $this->faker()->name();

        User::factory()->create([
            'name' => $name
        ]);

        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', [
            'name' => $name
        ]);
    }
}
