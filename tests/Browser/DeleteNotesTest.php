<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group delete
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
            ->assertPathIs('/dashboard') //memastikan masuk dashboard
            ->assertSee('Notes') //Memastikan melihat "notes"
            ->clickLink('Notes') //Klik link notes
            ->assertPathIs('/notes') //memastikan url ada di /notes
            ->assertSee('Author:') //melihat ada Author
            ->press('Delete') //klik tombol delete
            ->assertSee('Note has been deleted');
        });
    }
}
