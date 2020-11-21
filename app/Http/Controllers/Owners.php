<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class Owners extends Controller
{
    //
    public function index()
    {
        //$owners = Owner::all();

        return view("owners", [
            // pass in all the owners
            "owners" => Owner::all(),
        ]);
    }

    //public function show($id)
    public function show(Owner $owner)
    {

        return view("owners/owner", ["owner" => $owner]);

    }

}
