<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Modul 3') //memastikan ada teks "Modul 3"
            ->clickLink('Log in') //Klik link log in
            ->assertPathIs('/login') //Memastikan url ada di /login
            ->type('email', 'azka@mail.com') //mengetik email pada field
            ->type('password', '1202223173') //mengetik password pada field
            ->press('LOG IN') //klik tombol submit form
            ->assertPathIs('/dashboard') //memastikan masuk dashboard
            ->click('[dusk="user-dropdown-trigger"]') //klik dropdown
            ->click('[dusk="logout-button"]') //klik log out button
            ->assertPathIs('/') //memastikan link ada di index
            ->assertSee('Log in'); //Memastikan keadaan log out
        });
    }
}
