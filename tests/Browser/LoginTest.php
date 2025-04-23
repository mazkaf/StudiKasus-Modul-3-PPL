<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Modul 3') //memastikan ada teks "Modul 3"
            ->clickLink('Log in') //Klik link log in
            ->assertPathIs('/login') //Memastikan url ada di /login
            ->type('email', 'azka@mail.com') //mengetik email pada field
            ->type('password', '1202223173') //mengetik password pada field
            ->press('LOG IN') //klik tombol submit form
            ->assertPathIs('/dashboard'); //memastikan masuk dashboard
        });
    }
}
