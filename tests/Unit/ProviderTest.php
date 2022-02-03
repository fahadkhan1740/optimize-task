<?php

namespace Tests\Unit;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class ProviderTest extends TestCase
{
    /**
     * Test to fetch providers
     *
     * @return void
     */
    public function test_fetch_providers()
    {
        $response = $this->get('/api/providers', [
            'Accept' => 'application/json'
        ]);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('message', 'Providers fetched successfully')
                    ->has('data');
            });
        $this->assertTrue(true);
    }
}
