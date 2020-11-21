<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

// add below to allow access to Owner class
use App\Models\Owner;


class AddOwnerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testAddOwner()
    {
        Owner::create([
            "id" => 1,
            "first_name" => "Clive",
            "last_name" => "Master",
            "telephone" => "01225123724",
            "email" => "masterclive@gmail.com",
            "address_1" => "56 Lower Oldfield Park",
            "town" => "Bath",
            "postcode" => "BA2 3JG",
        ]);

        $ownerFromDB = Owner::first();
        
        
        $this->assertSame(1, $ownerFromDB->id);
        $this->assertSame("Clive", $ownerFromDB->first_name);
        $this->assertSame("Master", $ownerFromDB->last_name);
        $this->assertSame("01225123724", $ownerFromDB->telephone);
        $this->assertSame("masterclive@gmail.com", $ownerFromDB->email);
        $this->assertSame("56 Lower Oldfield Park", $ownerFromDB->address_1);
        $this->assertSame("Bath", $ownerFromDB->town);
        $this->assertSame("BA2 3JG", $ownerFromDB->postcode);

        $this->assertTrue(Owner::emailExists("masterclive@gmail.com"));
        $this->assertFalse(Owner::emailExists("clive@mail.com"));
        
    }

}


