<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_health_check_returns_a_successful_response(): void
    {
        $response = $this->get('api/health');

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'ok',
            'app' => 'voter'
        ]);
    }
}