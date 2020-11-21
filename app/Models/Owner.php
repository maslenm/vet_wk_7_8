<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Owner extends Model
{
    use HasFactory;

    protected $fillable = ["id", "first_name", "last_name", "telephone", "email", "address_1", "address_2", "town", "postcode"];

    public function fullName()
    {
    // return the first and last name as a full name string
        return "{$this->first_name} {$this->last_name}";

    }

    public function fullAddress()
    {
    // return all the properties from the owner's address as a string, using conditional for if there is no address_2    
        if ($this->address_2) {

            return "{$this->address_1}, {$this->address_2}, {$this->town}, {$this->postcode}";

        } else {

            return "{$this->address_1}, {$this->town}, {$this->postcode}";
        }

    }

    public function formattedPhoneNumber()
    {
        // chars 1-4
        $nums1to4 = substr($this->telephone, 0 ,4);
        
        // chars 5-7
        $nums5to7 = substr($this->telephone, 4, 3);

        //chars 8-11
        $nums8to11 = substr($this->telephone, 7, 4);

        return "{$nums1to4} {$nums5to7} {$nums8to11}";

    }


    // plural, as an owner can have multiple animals
    public function animals() 
    {
        // use hasMany relationship method
        return $this->hasMany(Animal::class);
    }
    
    public function testAddOwner(){
        $owner = new Owner([
            "id" => 1,
            "first_name" => "Clive",
            "last_name" => "Master",
            "telephone" => "01225123724",
            "email" => "masterclive@gmail.com",
            "address_1" => "56 Lower Oldfield Park",
            "town" => "Bath",
            "postcode" => "BA2 3JG",
            ]);
        }
        
        public static function emailExists($email)
        {
            
            return Owner::where('email', '=', $email)->get()->isNotEmpty();
            
        }
        
    };
    
    
    /* 
        public static function haveWeBananas($number)
        {
            if ($number === 0) {
                return "No we have no bananas";
            }
            if ($number === 1) {
                return "Yes we have 1 banana";
            }
    
    
            return "Yes we have {$number} bananas";
        } */
    