<?php

use App\Models\Address;
use App\Models\LastBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/address', function (Request $request) {
    return [
        'status' => 'OK',
        'data' => Address::all()
    ];
});

Route::get('/block', function (Request $request) {
    return [
        'status' => 'OK',
        'data' => LastBlock::orderBy('block', 'desc')->get()
    ];
});

Route::get('/qwe', function (Request $request) {

});
