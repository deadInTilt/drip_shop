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

    public function test_success_create_product(): void
    {
        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'group1']);
        $tag1 = Tag::factory()->create(['title' => 'tag1']);
        $tag2 = Tag::factory()->create(['title' => 'tag2']);

    $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
;"some title";12500;Abibas;Category1;"some description";"tag1,tag2";Color1;group1
CSV;

        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->artisan("import:products {$path}")
             ->assertExitCode(Command::SUCCESS);

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseHas('products', [
            'title' => 'some title',
            'price' => 12500,
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'quantity' => 0,
            'group_id' => $group->id,

        ]);

        $product = Product::where('title', 'some title')->first();
        $this->assertEquals(
            [$tag1->id, $tag2->id],
            $product->tags->pluck('id')->toArray()
        );
    }

    public function test_missed_require_params(): void
    {

        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'group1']);
        $tag1 = Tag::factory()->create(['title' => 'tag1']);
        $tag2 = Tag::factory()->create(['title' => 'tag2']);

        $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
;"some title";12500;;Category1;"some description";"tag1,tag2";Color1;group1
CSV;
        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->artisan("import:products {$path}")
            ->assertExitCode(Command::FAILURE)
            ->expectsOutput('При обработке товара 1 возникла ошибка - Отсутствует необходимое поле: brand');
//      $this->expectException(MissingRequiredFieldException::class);
    }

    public function test_tag_not_found(): void
    {

        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'group1']);
        $tag1 = Tag::factory()->create(['title' => 'tag1']);
        $tag2 = Tag::factory()->create(['title' => 'tag2']);

        $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
;"some title";12500;Abibas;Category1;"some description";"tag3,tag2";Color1;group1
CSV;
        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->artisan("import:products {$path}")
            ->assertExitCode(Command::FAILURE)
            ->expectsOutput('При обработке товара 1 возникла ошибка - Указанный тег не найден: tag3');
//      $this->expectException(TagNotFoundException::class);
    }

    public function test_optional_params_not_found(): void
    {

        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'group1']);
        $tag1 = Tag::factory()->create(['title' => 'tag1']);
        $tag2 = Tag::factory()->create(['title' => 'tag2']);

        $csv = <<<CSV
id;title;price;brand;category;description;tags;color;group
;"some title";12500;Abibas;Category1;"some description";"tag1,tag2";Color2;group1
CSV;
        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->artisan("import:products {$path}")
            ->assertExitCode(Command::FAILURE)
            ->expectsOutput('При обработке товара 1 возникла ошибка - Опциональный параметр не найден');
//      $this->expectException(TagNotFoundException::class);
    }

    public function test_product_not_found(): void
    {

        $brand = Brand::factory()->create(['title' => 'Abibas']);
        $category = Category::factory()->create(['title' => 'Category1']);
        $color = Color::factory()->create(['title' => 'Color1']);
        $group = Group::factory()->create(['title' => 'group1']);
        $tag1 = Tag::factory()->create(['title' => 'tag1']);
        $tag2 = Tag::factory()->create(['title' => 'tag2']);

        $product = Product::factory()->create([
            'title' => 'title',
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
;"some title";12500;Abibas;Category1;"some description";"tag1,tag2";Color2;group1
CSV;
        $path = storage_path('app/import_files/import_test.csv');
        file_put_contents($path, $csv);

        $this->artisan("import:products {$path}")
            ->assertExitCode(Command::FAILURE)
            ->expectsOutput('При обработке товара 1 возникла ошибка - Товар с ID 2 не найден');
//      $this->expectException(TagNotFoundException::class);
    }
}
