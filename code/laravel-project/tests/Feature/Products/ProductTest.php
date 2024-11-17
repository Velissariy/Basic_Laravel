<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test for retrieving the list of products.
     */
    public function test_can_list_products(): void
    {
        Product::factory()->count(5)->create();

        $response = $this->getJson('/products');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');
    }

    /**
     * Test for creating a new product.
     */
    public function test_can_create_product(): void
    {
        $productData = [
            'name' => 'Test Product',
            'description' => 'A description for the test product',
            'price' => 99.99,
            'quantity' => 10,
        ];

        $response = $this->postJson('/products', $productData);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'name' => 'Test Product',
                'price' => 99.99,
                'quantity' => 10,
            ]);
        $this->assertDatabaseHas('products', $productData);
    }

    /**
     * Test for retrieving a single product.
     */
    public function test_can_show_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/products/{$product->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $product->id,
                'name' => $product->name,
            ]);
    }

    /**
     * Test for updating a product.
     */
    public function test_can_update_product(): void
    {
        $product = Product::factory()->create();

        $updatedData = [
            'name' => 'Updated Product',
            'price' => 150,
            'quantity' => 5,
        ];

        $response = $this->putJson("/products/{$product->id}", $updatedData);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => 'Updated Product',
                'price' => 150,
                'quantity' => 5,
            ]);
        $this->assertDatabaseHas('products', $updatedData);
    }

    /**
     * Test for deleting a product.
     */
    public function test_can_delete_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/products/{$product->id}");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Product deleted successfully',
            ]);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
