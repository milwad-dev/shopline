<?php

namespace Modules\Product\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Modules\Category\Models\Category;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\Product\Models\Product;
use Modules\User\Models\User;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see index products page.
     *
     * @return void
     */
    public function test_admin_user_can_see_index_products_page()
    {
        $this->createUserWithLogin();

        $response = $this->get(route('products.index'));
        $response->assertViewIs('Product::index');
    }

    /**
     * Test admin user can see create products page.
     *
     * @return void
     */
    public function test_admin_user_can_see_create_products_page()
    {
        $this->createUserWithLogin();

        $response = $this->get(route('products.create'));
        $response->assertViewIs('Product::create');
    }

    /**
     * Test admin user can store products without attributes & tags.
     *
     * @return void
     */
    public function test_admin_user_can_store_products_without_attributes_tags()
    {
        $this->createUserWithLogin();

        $response = $this->post(route('products.store'), [
            'first_media' => UploadedFile::fake()->image('first_media.jpg'), // Mock
            'second_media' => UploadedFile::fake()->image('second_media.jpg'), // Mock
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(5, 15),
            'count' => 51,
            'type' => $this->faker->title,
            'short_description' => $this->faker->text,
            'body' => $this->faker->text,
            'status' => ProductStatusEnum::STATUS_ACTIVE->value,
            'categories' => Category::query()->inRandomOrder()->get()->toArray(),
            'galleries' => [
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
            ],
        ]);
        $response->assertRedirect(route('products.index'));

        $this->assertEquals(1, Product::query()->count());
    }

    /**
     * Test admin user can store products with attributes & tags.
     *
     * @return void
     */
    public function test_admin_user_can_store_products_with_attributes_tags()
    {
        $this->createUserWithLogin();

        $response = $this->post(route('products.store'), [
            'first_media' => UploadedFile::fake()->image('first_media.jpg'), // Mock
            'second_media' => UploadedFile::fake()->image('second_media.jpg'), // Mock
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(5, 15),
            'count' => 51,
            'type' => $this->faker->title,
            'short_description' => $this->faker->text,
            'body' => $this->faker->text,
            'status' => ProductStatusEnum::STATUS_ACTIVE->value,
            'categories' => Category::query()->inRandomOrder()->get()->toArray(),
            'galleries' => [
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
            ],
            'tags' => [
                $this->faker->title,
                $this->faker->title,
                $this->faker->title,
            ],
            'attributes' => [
                $this->faker->title => $this->faker->text,
                $this->faker->title => $this->faker->text,
                $this->faker->title => $this->faker->text,
                $this->faker->title => $this->faker->text,
            ],
        ]);
        $response->assertRedirect(route('products.index'));

        $this->assertEquals(1, Product::query()->count());
    }

    /**
     * Test admin user can see edit product page.
     *
     * @return void
     */
    public function test_admin_user_can_see_edit_product_page()
    {
        $this->createUserWithLogin();

        $product = $this->makeProduct();

        $response = $this->get(route('products.edit', $product->id));
        $response->assertViewIs('Product::edit');
    }

    /**
     * Test admin user can update product.
     *
     * @return void
     */
    public function test_admin_user_can_update_product()
    {
        $this->createUserWithLogin();

        $product = $this->makeProduct();

        $response = $this->patch(route('products.update', $product->id), [
            'first_media' => UploadedFile::fake()->image('first_media.jpg'),
            'second_media' => UploadedFile::fake()->image('second_media.jpg'),
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(5, 15),
            'count' => 51,
            'type' => $this->faker->title,
            'short_description' => $this->faker->text,
            'body' => $this->faker->text,
            'status' => ProductStatusEnum::STATUS_ACTIVE->value,
        ]);
        $response->assertRedirect(route('products.index'));
        $this->assertEquals(1, Product::query()->count());
    }

    /**
     * Test admin product by id.
     *
     * @return void
     */
    public function test_admin_user_can_delete_product()
    {
        $this->createUserWithLogin();
        $product = $this->makeProduct();

        $this->delete(route('products.destroy', $product->id))->assertOk();
        $this->assertEquals(0, Product::query()->count());
    }

    /**
     * Make product with factory.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    private function makeProduct()
    {
        return Product::factory()->create();
    }

    /**
     * Create user with login
     *
     * @return void
     */
    private function createUserWithLogin()
    {
        $user = User::factory()->create();
        auth()->login($user);
    }
}
