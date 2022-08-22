<?php

namespace Modules\Article\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Modules\Article\Enums\ArticleStatusEnum;
use Modules\Article\Models\Article;
use Modules\Article\Repositories\ArticleRepoEloquent;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\CategoryRepoEloquent;
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
        $response->assertViewHas('articles', (new ArticleRepoEloquent)->getLatestArticles()->paginate());
    }

    /**
     * Test admin user can see article create page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_article_create_page()
    {
        $this->withoutExceptionHandling();
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();

        $response = $this->get(route('articles.create'));
        $response->assertViewIs('Article::create');
        $response->assertViewHas('categories', (new CategoryRepoEloquent)->getActiveCategories()->get());
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

        $title = $this->faker->unique()->title;
        $response = $this->post(route('articles.store'), [
            'image' => UploadedFile::fake()->image('image.jpg'),
            'title' => $title,
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

        $this->assertDatabaseCount('articles', 1);
        $this->assertDatabaseHas('articles', [
            'title' => $title,
        ]);
    }

    /**
     * Test admin user can see article edit page by id.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_article_edit_page()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();
        $article = Article::factory()->create();

        $response = $this->get(route('articles.edit', $article->id));
        $response->assertViewIs('Article::edit');
        $response->assertViewHas(['article', 'categories']);
    }

    /**
     * Update article by id.
     *
     * @test
     * @return void
     */
    public function admin_user_can_update_article_with_categories()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();
        $article = Article::factory()->create();

        $title = $this->faker->unique()->title;
        $response = $this->patch(route('articles.update', $article->id), [
            'id' => $article->id,
            'image' => UploadedFile::fake()->image('image.jpg'),
            'title' => $title,
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

        $this->assertDatabaseCount('articles', 1);
        $this->assertDatabaseHas('articles', [
            'title' => $title,
        ]);
    }

    /**
     * Delete article by id.
     *
     * @test
     * @return void
     */
    public function admin_user_can_delete_article_by_id()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();
        $article = Article::factory()->create();

        $this->delete(route('articles.destroy', $article->id))->assertOk();
        $this->assertDatabaseCount('articles', 0);
    }

    /**
     * Change article status by id to active.
     *
     * @test
     * @return void
     */
    public function admin_user_can_change_article_status_to_active()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();
        $article = Article::factory()->create();
        $status = ArticleStatusEnum::STATUS_ACTIVE->value;

        $this->patch(route('articles.change.status',
        ['id' => $article->id, 'status' => $status]
        ))->assertOk();
        $this->assertDatabaseHas('articles', [
            'status' => $status
        ]);
    }

    /**
     * Change article status by id to in progress.
     *
     * @test
     * @return void
     */
    public function admin_user_can_change_article_status_to_in_progress()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();
        $article = Article::factory()->create();
        $status = ArticleStatusEnum::STATUS_IN_PROGRESS->value;

        $this->patch(route('articles.change.status',
            ['id' => $article->id, 'status' => $status]
        ))->assertOk();
        $this->assertDatabaseHas('articles', [
            'status' => $status
        ]);
    }

    /**
     * Change article status by id to inactive.
     *
     * @test
     * @return void
     */
    public function admin_user_can_change_article_status_to_inactive()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();
        $article = Article::factory()->create();
        $status = ArticleStatusEnum::STATUS_INACTIVE->value;

        $this->patch(route('articles.change.status',
            ['id' => $article->id, 'status' => $status]
        ))->assertOk();
        $this->assertDatabaseHas('articles', [
            'status' => $status
        ]);
    }

    /**
     * Change article status by id to active.
     *
     * @test
     * @return void
     */
    public function admin_user_cant_change_article_status_to_except_main_statuses()
    {
        $this->createUserWithLoginWithAssignPermissionWithAssignPermission();
        $article = Article::factory()->create();
        $status = 'test';

        $this->patch(route('articles.change.status',
            ['id' => $article->id, 'status' => $status]
        ))->assertStatus(500);
        $this->assertDatabaseMissing('articles', [
            'status' => $status
        ]);
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
