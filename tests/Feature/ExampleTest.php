<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->json('POST', '/ru/main', ['route' => '', 'locality' => 'Chisinau']);

        $response
            ->assertStatus(200);
    }
}
