<?php

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

Route::prefix("category")->group(function(){
    Route::get("/index","CategoryController@index");
    Route::post("/search","CategoryController@search");
    Route::post("/create","CategoryController@create");
    Route::post("/update/{id}","CategoryController@update");
    Route::delete("/delete/{id}","CategoryController@delete");
});

Route::prefix("brand")->group(function(){
    Route::get("/index","BrandController@index");
    Route::post("/search","BrandController@search");
    Route::post("/create","BrandController@create");
    Route::post("/update/{id}","BrandController@update");
    Route::delete("/delete/{id}","BrandController@delete");
});

Route::prefix("user")->group(function(){
    Route::get("/index","UserController@index");
    Route::post("/create","UserController@create");
    Route::post("/update/{id}","UserController@update");
    Route::delete("/delete/{id}","UserController@delete");
});

Route::prefix("product")->group(function(){
    Route::get("/index","ProductController@index");
    Route::post("/search","ProductController@search");
    Route::post("/create","ProductController@create");
    Route::post("/update/{id}","ProductController@update");
    Route::delete("/delete/{id}","ProductController@delete");
});

Route::prefix("cargo")->group(function(){
    Route::get("/index","CargoController@index");
    Route::post("/search","CargoController@search");
    Route::post("/create","CargoController@create");
    Route::post("/update/{id}","CargoController@update");
    Route::delete("/delete/{id}","CargoController@delete");
});
Route::prefix("order")->group(function(){
    Route::get("/index","OrderController@index");
    Route::post("/create","OrderController@create");
    Route::post("/update/{id}","OrderController@update");
    Route::delete("/delete/{id}","OrderController@delete");
});

Route::prefix("invoice")->group(function(){
    Route::get("/index","InvoiceController@index");
});

Route::prefix("address")->group(function(){
    Route::get("/index","AddressController@index");
    Route::post("/create","AddressController@create");
    Route::post("/update/{id}","AddressController@update");
    Route::delete("/delete/{id}","AddressController@delete");
});

