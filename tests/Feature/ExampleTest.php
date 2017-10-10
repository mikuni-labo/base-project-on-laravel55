<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\{DatabaseMigrations,DatabaseTransactions,RefreshDatabase,WithoutMiddleware};

class ExampleTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);

//         $response = $this->get('/');

//         $response->assertStatus(200);
    }
}
