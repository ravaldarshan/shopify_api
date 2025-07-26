<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyncedProduct;
use App\Traits\ShopifyService;
use App\Traits\SaaSBoxService;

class ShopifyStore extends Controller
{
    use ShopifyService, SaaSBoxService;

    public function syncProducts()
    {
        $products = $this->getShopifyProducts();

        foreach ($products as $product) {
            $syncedProduct = SyncedProduct::where('shopify_product_id', $product['id'])->first();

            if (!$syncedProduct) {
                $category_id = $this->findOrCreateSaaSBoxCategory($product);

                $saasBoxProduct = $this->createSaaSBoxProduct([
                    'sku' => $product['variants'][0]['sku'] ?? null,
                    'name' => $product['title'],
                    'slug' => $product['handle'],
                    'description' => $product['body_html'],
                    'is_active' => $product['status'] == 'active' ? true : false,
                    'price' => $product['variants'][0]['price'] ?? 0,
                    'category_id' => $category_id
                ]);

                if(isset($saasBoxProduct['data']['id'])) {
                    SyncedProduct::create([
                        'shopify_product_id' => $product['id'],
                        'saas_box_product_id' => $saasBoxProduct['data']['id'],
                    ]);
                }
            }
        }

        return "Products synced successfully!";
    }

    public function getProducts()
    {
        return $this->getSaaSBoxProducts();
    }

    public function createProduct(Request $request)
    {
        return $this->createSaaSBoxProduct($request->all());
    }

    public function updateProduct(Request $request, $id)
    {
        return $this->updateSaaSBoxProduct($id, $request->all());
    }

    public function deleteProduct($id)
    {
        return $this->deleteSaaSBoxProduct($id);
    }
}
