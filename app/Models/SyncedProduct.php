<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyncedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopify_product_id',
        'saas_box_product_id',
    ];
}