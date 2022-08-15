<?php

namespace Modules\Article\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Article\Enums\ArticleStatusEnum;
use Modules\Article\Repositories\ArticleRepo;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\CategoryRepo;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see article index page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_article_index_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->get(route('articles.index'));
        $response->assertViewIs('Article::index');
        $response->assertViewHas('articles', (new ArticleRepo)->getLatestArticles()->paginate());
    }

    /**
     * Test admin user can see article create page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_article_create_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->get(route('articles.create'));
        $response->assertViewIs('Article::create');
        $response->assertViewHas('categories', (new CategoryRepo)->getActiveCategories()->get());
    }

    /**
     * Test admin user can see validate store article.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_validated_store_article()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->post(route('articles.store'), []);
        $response->assertSessionHasErrors(['image', 'title', 'body', 'status', 'categories']);
        $response->assertRedirect();
    }

    /**
     * Test admin user can store article with categories.
     *
     * @test
     * @return void
     */
    public function admin_user_can_store_article_with_categories()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->post(route('articles.store'), [
            'image' => UploadedFile::fake()->image('image.jpg'),
            'title' => $this->faker->unique()->title,
            'body' => $this->faker->text,
            'keywords' => $this->faker->title,
            'description' => $this->faker->text,
            'status' => ArticleStatusEnum::STATUS_ACTIVE->value,
            'categories' => [
                Category::factory()->create()->id,
                Category::factory()->create()->id,
            ]
        ]);
        $response->assertSessionHas('alert');
        $response->assertRedirect(route('articles.index'));
    }

    /**
     * Create user with login & assign permission.
     *
     * @return void
     */
    private function createUserWithLoginWithAssignPermissionWithAssignPermission()
    {
        $user = User::factory()->create();
        auth()->login($user);

        $this->callPermissionSeeder();
        $user->givePermissionTo(Permission::PERMISSION_ARTICLES);
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
}
