<?php

use App\Http\Controllers\ShopifyStore;
use Illuminate\Support\Facades\Route;

Route::get('sync-products', [ShopifyStore::class, "syncProducts"]);
