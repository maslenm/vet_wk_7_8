<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animal;

class Treatment extends Model
{
    use HasFactory;
    // don't need timestamps
    // no idea why this one is public 
    public $timestamps = false;
    protected $fillable = ["name"];

    // using the belongsToMany() method 
    // as it's a many-to-many relationship 
    public function animals()
    {
        return $this->belongsToMany(Animal::class); 
    }

    //take array of strings, create tags if they don't exist and return collection
    //Also trim whitespace on strings.

    public static function fromStrings(array $strings) : Collection
    {
        return collect($strings)->map(fn($str) => trim($str))
                                ->unique()
                                ->map(fn($str) => Treatment::firstOrCreate(["name" => $str]));
    }
}


