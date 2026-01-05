<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TestHttpUnitesLegales extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function RunTest(): void
    {
        $response = $this->get('/api/unites-legales', ['siren' => '123456789']);

        $response->assertStatus(200);
    }
}
