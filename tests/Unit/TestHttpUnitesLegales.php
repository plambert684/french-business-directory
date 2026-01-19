<?php

namespace Tests\Unit;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\TestCase;

class TestHttpUnitesLegales extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function RunTest(): void
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['check-status', 'get-legal-units']
        );

        $response = $this->getJson('/api/entreprises/siren/433115904');

        $response->assertStatus(200);

    }
}
