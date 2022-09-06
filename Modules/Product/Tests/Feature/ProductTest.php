<?php

namespace Modules\Product\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Modules\Category\Models\Category;
use Modules\Product\Enums\ProductStatusEnum;
use Modules\Product\Models\Product;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
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
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('products.index'));
        $response->assertViewIs('Product::index');
        $response->assertViewHas('products');
    }

    /**
     * Test usual user can not see index products page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_index_products_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('products.index'));
        $response->assertForbidden();
    }

    /**
     * Test admin user can see create products page.
     *
     * @return void
     */
    public function test_admin_user_can_see_create_products_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('products.create'));
        $response->assertViewIs('Product::create');
        $response->assertViewHas('categories');
    }

    /**
     * Test usual user can not see create products page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_create_products_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $response = $this->get(route('products.create'));
        $response->assertForbidden();
    }

    /**
     * Test admin user can store products without attributes & tags.
     *
     * @return void
     */
    public function test_admin_user_can_store_products_without_attributes_tags()
    {
        $this->createUserWithLoginWithAssignPermission();

        Category::factory(5)->create();
        $response = $this->post(route('products.store'), $this->getStoreProductData());
        $response->assertRedirect(route('products.index'));

        $this->assertEquals(1, Product::query()->count());
    }

    /**
     * Test usual user can not store products
     *
     * @return void
     */
    public function test_usual_user_can_not_store_products()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        Category::factory(5)->create();
        $response = $this->post(route('products.store'), $this->getStoreProductData());
        $response->assertForbidden();

        $this->assertEquals(0, Product::query()->count());
    }

    /**
     * Test admin user can store products with attributes & tags.
     *
     * @return void
     */
    public function test_admin_user_can_store_products_with_attributes_tags()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->post(route('products.store'), [
            'first_media' => UploadedFile::fake()->image('first_media.jpg'), // Mock
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(5, 15),
            'count' => 51,
            'type' => $this->faker->title,
            'short_description' => $this->faker->text,
            'body' => $this->faker->text,
            'status' => ProductStatusEnum::STATUS_ACTIVE->value,
            'categories' => [
                Category::factory()->create()->id,
                Category::factory()->create()->id,
                Category::factory()->create()->id,
            ],
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
                [
                    'attributekeys' => $this->faker->title,
                    'attributevalues' => $this->faker->text,
                ],
                [
                    'attributekeys' => $this->faker->title,
                    'attributevalues' => $this->faker->text,
                ],
                [
                    'attributekeys' => $this->faker->title,
                    'attributevalues' => $this->faker->text,
                ],
                [
                    'attributekeys' => $this->faker->title,
                    'attributevalues' => $this->faker->text,
                ],
            ],
            'is_popular' => 1,
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
        $this->createUserWithLoginWithAssignPermission();

        $product = $this->makeProduct();

        $response = $this->get(route('products.edit', $product->id));
        $response->assertViewIs('Product::edit');
        $response->assertViewHas(['categories', 'product']);
    }

    /**
     * Test usual user can see not edit product page.
     *
     * @return void
     */
    public function test_usual_user_can_not_see_edit_product_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $product = $this->makeProduct();
        $response = $this->get(route('products.edit', $product->id));
        $response->assertForbidden();
    }

    /**
     * Test admin user can update product.
     *
     * @return void
     */
    public function test_admin_user_can_update_product()
    {
        $this->createUserWithLoginWithAssignPermission();

        $product = $this->makeProduct();
        $category = Category::factory()->create();

        $response = $this->patch(
            route('products.update', $product->id),
            $this->getProductUpdateData($product, $category)
        );
        $response->assertRedirect(route('products.index'));

        $this->assertEquals(1, Product::query()->count());
    }


    /**
     * Test usual user can not update product.
     *
     * @return void
     */
    public function test_usual_user_can_not_update_product()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $product = $this->makeProduct();
        $category = Category::factory()->create();

        $response = $this->patch(
            route('products.update', $product->id),
            $this->getProductUpdateData($product, $category)
        );
        $response->assertForbidden();

        $this->assertEquals(1, Product::query()->count());
    }

    /**
     * Test admin user can delete product by id.
     *
     * @return void
     */
    public function test_admin_user_can_delete_product()
    {
        $this->createUserWithLoginWithAssignPermission();
        $product = $this->makeProduct();

        $this->delete(route('products.destroy', $product->id))->assertOk();
        $this->assertEquals(0, Product::query()->count());
    }

    /**
     * Test usual user can not delete product by id.
     *
     * @return void
     */
    public function test_usual_user_can_not_delete_product()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $product = $this->makeProduct();

        $this->delete(route('products.destroy', $product->id))->assertForbidden();
        $this->assertEquals(1, Product::query()->count());
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
     * Create user with login & assign permission.
     *
     * @param  bool $permission
     * @return void
     */
    private function createUserWithLoginWithAssignPermission(bool $permission = true)
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        if ($permission) {
            $user->givePermissionTo(Permission::PERMISSION_PRODUCTS);
        }
    }

    /**
     * Call permission seeder.
     *
     * @return void
     */
    private function callPermissionSeeder()
    {
        $this->seed(PermissionSeeder::class);
    }

    /**
     * Return store product data.
     *
     * @return array
     */
    private function getStoreProductData(): array
    {
        return [
            'first_media' => UploadedFile::fake()->image('first_media.jpg'), // Mock
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(5, 15),
            'count' => 51,
            'type' => $this->faker->title,
            'short_description' => $this->faker->text,
            'body' => $this->faker->text,
            'status' => ProductStatusEnum::STATUS_ACTIVE->value,
            'categories' => Category::query()->inRandomOrder()->get()->pluck('id')->toArray(),
            'galleries' => [
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
                UploadedFile::fake()->image(Str::random(10) . '.jpg'),
            ],
            'attributes' => [
                [
                    'attributekeys' => null,
                ]
            ],
            'is_popular' => 1,
        ];
    }

    /**
     * Return update product data.
     *
     * @param  mixed $product
     * @param  mixed $category
     * @return array
     */
    private function getProductUpdateData(mixed $product, mixed $category): array
    {
        return [
            'id' => $product->id,
            'first_media' => UploadedFile::fake()->image('first_media.jpg'),
            'title' => $this->faker->title,
            'price' => $this->faker->numberBetween(5, 15),
            'count' => 51,
            'type' => $this->faker->title,
            'short_description' => $this->faker->text,
            'body' => $this->faker->text,
            'status' => ProductStatusEnum::STATUS_ACTIVE->value,
            'categories' => [
                $category->id,
            ],
            'is_popular' => 1,
        ];
    }
}
