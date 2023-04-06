<?php

namespace Modules\Contact\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Contact\Models\Contact;
use Modules\RolePermission\Database\Seeds\PermissionSeeder;
use Modules\RolePermission\Models\Permission;
use Modules\User\Models\User;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Get table name.
     *
     * @var string
     */
    private string $tableName = 'contacts';

    /**
     * Test admin user can see index contact page.
     *
     * @test
     *
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
     *
     * @return void
     */
    public function usual_user_can_not_see_index_contact_page()
    {
        $this->createUserWithLoginWithAssignPermission(false);
        $this->get(route('contacts.index'))->assertForbidden();
    }

    /**
     * Test admin user can delete contact.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_delete_contact()
    {
        $this->createUserWithLoginWithAssignPermission();

        $contact = Contact::factory()->create();

        $this->delete(route('contacts.destroy', $contact->id))->assertOk();
        $this->assertDatabaseMissing($this->tableName, [
            'name'    => $contact->name,
            'email'   => $contact->email,
            'phone'   => $contact->phone,
            'subject' => $contact->subject,
            'message' => $contact->message,
        ]);
        $this->assertDatabaseCount($this->tableName, 0);
        $this->assertEquals(0, Contact::query()->count());
    }

    /**
     * Test usual user can delete contact.
     *
     * @test
     *
     * @return void
     */
    public function usual_user_can_delete_contact()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $contact = Contact::factory()->create();

        $this->delete(route('contacts.destroy', $contact->id))->assertForbidden();
        $this->assertDatabaseHas($this->tableName, [
            'name'    => $contact->name,
            'email'   => $contact->email,
            'phone'   => $contact->phone,
            'subject' => $contact->subject,
            'message' => $contact->message,
        ]);
        $this->assertDatabaseCount($this->tableName, 1);
        $this->assertEquals(1, Contact::query()->count());
    }

    /**
     * Test admin user can update is_read to true.
     *
     * @test
     *
     * @return void
     */
    public function admin_user_can_update_is_read()
    {
        $this->createUserWithLoginWithAssignPermission();

        $contact = Contact::factory()->create(['is_read' => false]);

        $this->patch(route('contacts.update-is-read', $contact->id))->assertOk();
        $this->assertDatabaseHas($this->tableName, [
            'name'    => $contact->name,
            'email'   => $contact->email,
            'phone'   => $contact->phone,
            'subject' => $contact->subject,
            'message' => $contact->message,
            'is_read' => 1,
        ]);
        $this->assertDatabaseCount($this->tableName, 1);
        $this->assertEquals(1, Contact::query()->count());
    }

    /**
     * Test usual user can not update is_read to true.
     *
     * @test
     *
     * @return void
     */
    public function usual_user_can_not_update_is_read()
    {
        $this->createUserWithLoginWithAssignPermission(false);

        $contact = Contact::factory()->create(['is_read' => false]);

        $this->patch(route('contacts.update-is-read', $contact->id))->assertForbidden();
        $this->assertDatabaseMissing($this->tableName, ['is_read' => true]);
        $this->assertDatabaseHas($this->tableName, ['is_read' => false]);
        $this->assertDatabaseCount($this->tableName, 1);
        $this->assertEquals(1, Contact::query()->count());
    }

    /**
     * Create user with login & assign permission.
     *
     * @param bool $permission
     *
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
