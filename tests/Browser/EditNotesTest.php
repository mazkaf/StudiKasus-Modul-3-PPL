<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group edit
     */
    public function testEdit(): void
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
            ->assertSee('Edit') //melihat ada tombol edit
            ->clickLink('Edit') //klik tombol edit
            ->assertPathIs('/edit-note-page/4') //memastikan ke notes yang dituju
            ->type('title', 'Test Edit') //mengubah title
            ->type('description', 'This is an edited note') //mengubah deskripsi
            ->press('UPDATE') //klik tombol update
            ->assertPathIs('/notes') //memastikan kembali ke url notes
            ->assertSee('Test Edit  '); //memastikan note berubah
        });
    }
}
