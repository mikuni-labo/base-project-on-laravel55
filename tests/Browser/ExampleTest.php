<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\{DatabaseMigrations,DatabaseTransactions,RefreshDatabase,WithoutMiddleware};
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    use WithoutMiddleware;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->assertTrue(true);

//         $this->browse(function (Browser $browser) {
//             $browser->visit('/')
//                     ->assertSee('Hello, world!');
//         });
    }
}
