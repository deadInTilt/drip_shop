<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\Console\Command\Command;
use Tests\TestCase;

class ConsoleImportProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_file_not_fount():void
    {
        $path = '/invaid/path/to/file';

        $this->artisan('import:products', ['path' => $path])
             ->assertExitCode(Command::FAILURE)
             ->expectsOutput("File not found: {$path}");
    }

    public function test_success_create_product(): void
    {
        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'Group1']);
        $tag1 = Tag::factory()->create(['title' => 'Tag1']);
        $tag2 = Tag::factory()->create(['title' => 'Tag2']);

        $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
;"Some title";12500;Abibas;Category1;"Some description";"Tag1,Tag2";Color1;Group1
CSV;

        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->artisan("import:products {$path}")
            ->assertExitCode(Command::SUCCESS);

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', [
            'title' => 'Some title',
            'price' => 12500,
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'quantity' => 0,
            'group_id' => $group->id,

        ]);

        $product = Product::where('title', 'Some title')->first();
        $this->assertEquals(
            [$tag1->id, $tag2->id],
            $product->tags->pluck('id')->toArray()
        );
    }

    public function test_success_update_product(): void
    {

        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'Group1']);
        $tag1 = Tag::factory()->create(['title' => 'Tag1']);
        $tag2 = Tag::factory()->create(['title' => 'Tag2']);

        $product = Product::factory()->create([
            'title' => 'Some title',
            'price' => 1,
            'brand_id' => 1,
            'category_id' => 1,
            'description' => null,
            'quantity' => 0,
            'color_id' => 1,
            'group_id' => 1,
        ]);


        $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
1;"Updated title";1000;Abibas;Category1;"Updated description";"Tag1";Color1;Group1
CSV;
        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->artisan("import:products {$path}")
            ->assertExitCode(Command::SUCCESS);

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', [
            'title' => 'Updated title',
            'price' => 1000,
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'quantity' => 0,
            'group_id' => $group->id,

        ]);

        $updatedProduct = Product::where('title', 'Updated title')->first();
        $this->assertEquals(
            [$tag1->id],
            $updatedProduct->tags->pluck('id')->toArray()
        );
    }

    public function test_missed_require_params(): void
    {

        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'Group1']);
        $tag1 = Tag::factory()->create(['title' => 'Tag1']);
        $tag2 = Tag::factory()->create(['title' => 'Tag2']);

        $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
;"Some title";12500;Abibas;Category1;"Some description";"Tag1,Tag2";Color1;Group1
CSV;
        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->assertDatabaseCount('products', 0);
    }

    public function test_tag_not_found(): void
    {

        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'Group1']);
        $tag1 = Tag::factory()->create(['title' => 'Tag1']);
        $tag2 = Tag::factory()->create(['title' => 'Tag2']);

        $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
;"Some title";12500;Abibas;Category1;"Some description";"Tag1,Tag3";Color1;Group1
CSV;
        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->assertDatabaseCount('products', 0);
    }

    public function test_product_not_found(): void
    {

        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'Group1']);
        $tag1 = Tag::factory()->create(['title' => 'Tag1']);
        $tag2 = Tag::factory()->create(['title' => 'Tag2']);

        $product = Product::factory()->create([
            'title' => 'Some title',
            'price' => 1,
            'brand_id' => 1,
            'category_id' => 1,
            'description' => null,
            'quantity' => 0,
            'color_id' => 1,
            'group_id' => 1,
        ]);


        $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
5;"Some title";12500;Abibas;Category1;"Some description";"Tag1,Tag2";Color1;Group1
CSV;
        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->assertDatabaseCount('products', 1);
    }
}
