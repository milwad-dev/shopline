<?php

namespace Modules\Contact\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see index contact page.
     *
     * @test
     * @return void
     */
    public function admin_user_can_see_index_contact_page()
    {
        $this->createUserWithLoginWithAssignPermission();

        $response = $this->get(route('contacts.index'));
        $response->assertViewIs('Contact::index');
        $response->assertViewHas('contacts');
    }

    /**
     * Test usual user can not see index contact page.
     *
     * @test
     * @return void
     */
    public function usual_user_can_not_see_index_contact_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $this->get(route('contacts.index'))->assertForbidden();
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
            $user->givePermissionTo(Permission::PERMISSION_CONTACTS);
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
}
