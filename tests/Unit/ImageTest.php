<?php

namespace Tests\Unit;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class ImageTest extends TestCase
{
    /**
     * Test to fetch images
     *
     * @return void
     */
    public function test_fetch_images()
    {
        $response = $this->get('/api/images', [
            'Accept' => 'application/json'
        ]);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('message', 'Images fetched successfully')
                    ->has('data');
            });
        $this->assertTrue(true);
    }
}
