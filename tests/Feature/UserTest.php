<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_basic_request() {
        $this->withoutExceptionHandling();

        $response = $this->get('/hello');

        // $response->dd();

        $response->assertStatus(200);
    }
    
    /**
     * @return json data
     */
    public function test_third_party_api() {
        $response = $this->getJson('https://jsonplaceholder.typicode.com/posts');
        $response->dd();
        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);

    }
}
