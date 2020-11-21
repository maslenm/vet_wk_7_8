<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Owners;
use App\Http\Controllers\API\Animals;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
Route::get('/owners', [Owners::class, 'index']); // GET /api/owners ->Api/Owners (controller) ->index method
Route::get('/owners/{owner}', [Owners::class, 'show']); // GET /owners/{owner} (id) ->Api/Owners (controller) ->show method
Route::post('/owners/{owner}', [Owners::class, 'store']); // Create new owner ->Api/Owners (controller) ->store method
Route::put('/owners/{owner}', [Owners::class, 'update']); // Updates an existing owner ->Api/Owners (controller) ->update method
Route::delete('/owners/{owner}', [Owners::class, 'destroy']); // Delete owner (id) ->Api/Owners (controller) ->destroy method

 */


// /owners
Route::group(["prefix" => "owners"], function () {
    Route::get("", [Owners::class, "index"]); // GET /api/owners ->Api/Owners (controller) ->index method
    Route::post("", [Owners::class, "store"]); // POST /api/owners

    // /owners/owner_id
    Route::group(["prefix" => "{owner}"], function () {
        Route::get("", [Owners::class, "show"]); //owners/{owner}
        Route::put("", [Owners::class, "update"]);
        Route::delete("", [Owners::class, "destroy"]); // PUT /api/owners/123..

        // /owners/owner_id/animals/
        Route::group(["prefix" => "animals"], function (){
            Route::get("", [Animals::class, "index"]);
            Route::post("", [Animals::class, "store"]);

        Route::group(["prefix" => "{animal}"], function () {
            Route::get("", [Animals::class, "show"]);
            Route::put("", [Animals::class, "update"]);
            Route::delete("", [Animals::class, "destroy"]);
        
        });   

        });
    });


});



