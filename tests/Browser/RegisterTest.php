<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     */
    public function testRegister(): void
    {
        $this->browse (function(Browser $browser) {
            $browser->visit('/') //mengarah ke URL utama
                ->assertSee('Modul 3') //memastikan ada teks "Modul 3"
                ->clickLink('Register') //Klik link register
                ->assertPathIs('/register') //Memastikan url ada di /register
                ->type('name', 'Muhammad Azka Farhan') //mengetik nama pada field
                ->type('email', 'azka@mail.com') //mengetik email pada field
                ->type('password', '1202223173') //mengetik password pada field
                ->type('password_confirmation', '1202223173') //mengulangi password pada field
                ->press('REGISTER') //klik tombol submit form
                ->assertPathIs('/dashboard'); //memastikan masuk dashboard
        });
    }
}
