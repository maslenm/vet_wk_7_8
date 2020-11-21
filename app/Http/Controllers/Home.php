<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Home extends Controller
{

    public function index()
    {
       /*   return view('welcome');
    }

    function greeting()
    {  */
        $hour = date("H"); //hour of day 24hr with leading 0 (01:00 etc)
        
            if ($hour < 12) {
            
                $result = "Good Morning!";

            } else if ($hour >= 12 && $hour < 17) {

                $result = "Good Afternoon!";

            } else if ($hour >= 17) {

                $result = "Good Evening!";

            }

        return view('welcome', [ "greeting" => $result ]);

    }

};



