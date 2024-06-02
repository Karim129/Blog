<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
/**
 * Run the database seeds.
 */
    public function run(): void
    {

        try {
            $roleSuper = Role::query()->createOrFirst(['name' => 'SuperAdmin']);
            $roleAdmin = Role::query()->createOrFirst(['name' => 'Admin']);

            $permissions = collect(['applicant-list', 'applicant-create', 'applicant-edit', 'applicant-delete', 'career-list', 'career-create', 'career-edit', 'career-delete', 'client-list', 'client-create', 'client-edit', 'client-delete', 'contact-list', 'contact-create', 'contact-edit', 'contact-delete', 'FAQ-list', 'FAQ-create', 'FAQ-edit', 'FAQ-delete', 'post-list', 'post-create', 'post-edit', 'post-delete', 'project-list', 'project-create', 'project-edit', 'project-delete', 'role-list', 'role-create', 'role-edit', 'role-delete', 'permission-list', 'permission-create', 'permission-edit', 'permission-delete', 'service-list', 'service-create', 'service-edit', 'service-delete', 'testimonial-list', 'testimonial-create', 'testimonial-edit', 'testimonial-delete', 'user-list', 'user-create', 'user-edit', 'user-delete', 'settings-list', 'settings-get-data', 'settings-edit']);
            $permissions->each(function ($permission) {
                Permission::query()->create(['name' => $permission]);
            });
            // $roleSuper->givePermissionTo($permissions);
        } catch (\Exception $e) {
            // dd($e);
        }
    }
}
