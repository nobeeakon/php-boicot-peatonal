<?php

namespace Tests\Feature;

use App\Traits\Uuids;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_subscribe(): void
    {
        $safeEmail = $this->faker->safeEmail;
        $response = $this->post('/subscriptions', [
            'email' => $safeEmail,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $safeEmail,
        ]);
    }
}