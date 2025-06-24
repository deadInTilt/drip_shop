<?php

namespace Tests\Feature\API;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WishlistControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create(['role_id' => 2]);

        Category::factory()->count(10)->create();
        Color::factory()->count(10)->create();
        Brand::factory()->count(10)->create();
        Product::factory()->count(10)->create();
    }

    public function test_guess_cannot_access_wishlist(): void
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->get('api/wishlist');

        $response->assertJsonFragment([
            'message' => 'Unauthenticated'
        ]);
    }

    public function test_user_can_view_empty_wishlist(): void
    {
        $response = $this->actingAs($this->user)->get('/api/wishlist');

        $response->assertOk()->assertJsonFragment([
            'data' => []
        ]);
    }

    public function test_user_can_view_wishlist(): void
    {
        $response = $this->actingAs($this->user)->get('/api/wishlist');

        $response->assertOk();
    }

    public function test_user_can_add_item_to_wishlist(): void
    {
        $product = Product::factory()->create();

        $response = $this->actingAs($this->user)->post('/api/wishlist', [
            'product_id' => $product->id
        ]);

        $response->assertCreated()->assertJsonFragment([
            'message' => 'Item added to wishlist'
        ]);

        $this->assertDatabaseHas('wishlist_items', [
            'user_id' => $this->user->id,
            'product_id' => $product->id
        ]);
    }
}
