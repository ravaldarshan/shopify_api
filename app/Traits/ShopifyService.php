<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ShopifyService
{
    private $apiPassword = config('services.shopify.password');
    private $shopifyStore = config('services.shopify.store');
    private $api_version = config('services.shopify.api_version');

    public function getShopifyHttp()
    {
        return Http::withHeaders([
            "X-Shopify-Access-Token" => $this->apiPassword
        ])->withoutVerifying();
    }

    public function getShopifyProducts()
    {
        $response = $this->getShopifyHttp()->get("https://{$this->shopifyStore}.myshopify.com/admin/api/{$this->api_version}/products.json");
        return $response->json()['products'];
    }
}
