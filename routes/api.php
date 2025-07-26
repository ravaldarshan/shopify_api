<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopifyStore;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('products', [ShopifyStore::class, 'getProducts']);
Route::post('products', [ShopifyStore::class, 'createProduct']);
Route::put('products/{id}', [ShopifyStore::class, 'updateProduct']);
Route::delete('products/{id}', [ShopifyStore::class, 'deleteProduct']);
