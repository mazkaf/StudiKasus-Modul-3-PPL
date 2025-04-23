<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group create
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
            ->clickLink('Create Note') //klik link create note
            ->assertPathIs('/create-note') //memastikan url berada di /create-note
            ->type('title', 'Test Note') //memasukkan judul di field
            ->type('description', 'This is a test note') //memasukkan deskripsi di field
            ->press("CREATE") //menekan tombol create
            ->assertPathIs('/notes') //memastikan url kembali ke /notes
            ->assertSee('0 seconds ago'); //memastikan new note sudah dibuat
        });
    }
}
