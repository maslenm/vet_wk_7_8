<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Treatment;


class Animal extends Model
{
    use HasFactory;

    protected $fillable = ["id", "name", "type", "date_of_birth", "weight_kg", "height_m", "biteyness", "owner_id"];

    // setup the other side of the relationship
    // use singular, as an animal only has one owner
    public function owner()
    {
        // an animal belongs to an owner
        return $this->belongsTo(Owner::class);
    }

    // use the belongsToMany() method again
    public function treatments() 
    {
    return $this->belongsToMany(Treatment::class); 
    }

    public function dangerous()
    {
       /*  if ($this->biteyness >= 3) {
            return true;
        }
        return false; */

        return ($this->biteyness >= 3);

    }

    // just accept an array of strings
    // we don't want to pass request in as there's no  // reason models should know about about the request 
    public function setTreatments(array $strings) : Animal
    {
        $treatments = Treatment::fromStrings($strings);

        // we're on an animal instance, so use $this      
        // pass in collection of IDs 
        $treatment_ids = $treatments->pluck("id");
        $this->treatments()->sync($treatment_ids);

        // return $this in case we want to chain
        return $this; 
    }

    
}


