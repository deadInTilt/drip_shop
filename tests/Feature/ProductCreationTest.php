<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_product_can_be_created_and_stored_in_database(): void
    {
        $this->withoutExceptionHandling();

        Storage::fake('public');

        $brand = Brand::factory()->create();
        $category = Category::factory()->create();
        $color = Color::factory()->create();
        $group = Group::factory()->create();
        $tags = Tag::factory()->count(2)->create();

        $data = [
            'title' => 'Test Product',
            'quantity' => 5,
            'price' => 199.99,
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'color_id' => $color->id,
            'group_id' => $group->id,
            'tags_ids' => $tags->pluck('id')->toArray(),
            'preview_image' => UploadedFile::fake()->image('product.jpg'),
        ];

        $this->seed(RoleSeeder::class);
        $this->seed(RolePermissionSeeder::class);
        $user = User::factory()->create(['role_id' => 1]);

        $response = $this->actingAs($user)->post(route('admin.product.store'), $data);

        $response->assertRedirect(route('admin.product.index'));

        $this->assertDatabaseHas('products', [
            'title' => 'Test Product',
            'price' => 199.99,
            'brand_id' => $brand->id,
        ]);

        $product = Product::where('title', 'Test Product')->first();

        $this->assertCount(2, $product->tags);

        Storage::disk('public')->assertExists($product->preview_image);
    }
}
