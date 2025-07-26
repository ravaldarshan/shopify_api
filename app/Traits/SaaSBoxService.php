<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait SaaSBoxService
{
    private $saasBoxApiUrl = config('services.saasbox.url');
    private $saasBoxApiKey = config('services.saasbox.key');

    public function getSaaSBoxHttp()
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->saasBoxApiKey,
            'Accept' => 'application/json',
        ])->withoutVerifying();
    }

    public function getSaaSBoxProducts()
    {
        return $this->getSaaSBoxHttp()->get("{$this->saasBoxApiUrl}/products")->json();
    }

    public function createSaaSBoxProduct($product)
    {
        return $this->getSaaSBoxHttp()->post("{$this->saasBoxApiUrl}/products", $product)->json();
    }

    public function updateSaaSBoxProduct($id, $product)
    {
        return $this->getSaaSBoxHttp()->put("{$this->saasBoxApiUrl}/products/{$id}", $product)->json();
    }

    public function deleteSaaSBoxProduct($id)
    {
        return $this->getSaaSBoxHttp()->delete("{$this->saasBoxApiUrl}/products/{$id}")->json();
    }

    public function findOrCreateSaaSBoxCategory($product)
    {
        // return 13;
        $response = $this->getSaaSBoxHttp()->post("{$this->saasBoxApiUrl}/categories", [
            'name' => $product['product_type'] ?? $product['handle'] ?? 'Default',
            'title' => $product['product_type'] ?? $product['handle'] ?? 'Default',
            'description' => $product['product_type'] ?? $product['handle'] ?? 'Default',
        ]);

        if (isset($response->json()['data']['id'])) {
            return $response->json()['data']['id'];
        }

        return 0;
    }
}
