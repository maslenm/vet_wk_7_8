<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\API\OwnerRequest;
use App\Http\Resources\API\OwnerResource;
use App\Http\Resources\API\OwnerListResource;
use App\Models\Owner;



class Owners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the owners
        // needs to return multiple articles
        // so we use the collection method
        return OwnerListResource::collection(Owner::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnerRequest $request)
    {
        // get all the request data
        // returns an array of all the data the user sent 
        $data = $request->all();

        // create owner with data and store in DB
        // and return it as JSON
        // automatically gets 201 status as it's a POST request

        // store article in variable    
        $owner = Owner::create($data);
        
        // return the resource
        return new OwnerResource($owner);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        // just return resource
        return new OwnerResource($owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnerRequest $request, Owner $owner)
    {
        //$owner = Owner::find($id);

        // get the request data
        $data = $request->all();

        // update the article using the fill method 
        // then save it to the database 
        //$owner->fill($data)->save(); //not in use
        $owner->update($data);


        // return the resource
        return new OwnerResource($owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        // delete the owner from the DB
        $owner->delete();

        // use a 204 code as there is no content in the response
        return response(null, 204);

    }
}
