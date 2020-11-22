<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\AnimalRequest;
use App\Http\Resources\API\AnimalResource;
use App\Http\Resources\API\AnimalListResource;
use App\Models\Animal;
use App\Models\Owner;


class Animals extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Owner $owner)
    {
        return AnimalListResource::collection(Animal::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request, Owner $owner)
    {
        //$data = $request->all();
        $animal_data = $request->only(["id", "name", "type", "date_of_birth", "weight_kg", "height_m", "biteyness", "owner_id"]);

        $treatment_data = $request->get('treatments');

        $animal = new Animal($animal_data);
        $animal->owner()->associate($owner);
        $animal->save();
            
        $animal->setTreatments($treatment_data);

        return new AnimalResource($animal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* 
    public function show(Owner $owner, Animal $animal)
    {
        return new AnimalResource($animal);
    }
 */

    public function show(Owner $owner, Animal $animal)
    {
        $this->checkAccess($owner, $animal);
        return new AnimalResource($animal);
    }

    private function checkAccess(Owner $owner, Animal $animal)
    {
        if ($owner->id !== $animal->owner_id){
                abort(403, 'This animal does not belong to this owner.');
    }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalRequest $request, Owner $owner, Animal $animal)
    {
        $animal_data = $request->only(["id", "name", "type", "date_of_birth", "weight_kg", "height_m", "biteyness"]);

        $treatment_data = $request->get('treatments');
        
        $animal->update($animal_data);

        $animal->setTreatments($treatment_data);

        return new AnimalResource($animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner, Animal $animal)
    {
        $animal->delete();
        return response(null, 204);
    }
}
