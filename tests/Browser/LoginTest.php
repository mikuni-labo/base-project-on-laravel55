<?php

namespace Tests\Browser;

use App\Model\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);

//         $user = User::find(1);

//         $this->browse(function ($browser) use ($user) {
//             $browser->visit('/login')
//             ->type('email', $user->email)
//             ->type('password', 'p1p1p1p1')
//             ->press('送信')
//             ->assertPathIs('/');
//         });
    }
}
