<?php

namespace Tests\Unit;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class VideoTest extends TestCase
{
    /**
     * Test to fetch videos
     *
     * @return void
     */
    public function test_fetch_videos()
    {
        $response = $this->get('/api/videos', [
            'Accept' => 'application/json'
        ]);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(function (AssertableJson $json) {
                $json->where('status', true)
                    ->where('message', 'Videos fetched successfully')
                    ->has('data');
            });
        $this->assertTrue(true);
    }
}
