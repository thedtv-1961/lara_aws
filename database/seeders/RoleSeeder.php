<?php

namespace Database\Seeders;

use App\Common\Constant;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => Constant::ROLE_ADMIN,
                'permissions' => [
                    Constant::PERMISSION_PRODUCT_DELETE,
                    Constant::PERMISSION_PRODUCT_VIEW,
                    Constant::PERMISSION_PRODUCT_ADD,
                    Constant::PERMISSION_PRODUCT_EDIT,
                    Constant::PERMISSION_CATEGORY_VIEW,
                    Constant::PERMISSION_CATEGORY_ADD,
                    Constant::PERMISSION_CATEGORY_DELETE,
                    Constant::PERMISSION_CATEGORY_EDIT,
                ],
            ],
            [
                'name' => Constant::ROLE_STAFF,
                'permissions' => [
                    Constant::PERMISSION_PRODUCT_VIEW,
                    Constant::PERMISSION_PRODUCT_ADD,
                    Constant::PERMISSION_CATEGORY_VIEW,
                ],
            ],
        ];
        $categoryPermissions = [
            Constant::PERMISSION_CATEGORY_VIEW,
            Constant::PERMISSION_CATEGORY_ADD,
            Constant::PERMISSION_CATEGORY_DELETE,
            Constant::PERMISSION_CATEGORY_EDIT,
        ];
        $productPermissions = [
            Constant::PERMISSION_PRODUCT_VIEW,
            Constant::PERMISSION_PRODUCT_EDIT,
            Constant::PERMISSION_PRODUCT_ADD,
            Constant::PERMISSION_PRODUCT_DELETE,
        ];

        foreach ($productPermissions as $productPermission) {
            Permission::create(['name' => $productPermission]);
        }

        foreach ($categoryPermissions as $categoryPermission) {
            Permission::create(['name' => $categoryPermission]);
        }

        foreach ($roles as $role) {
            $roleInserted = Role::create(['name' => $role['name']]);

            // Set permission for Admin role:
            if ($role['name'] == Constant::ROLE_ADMIN) {
                $roleInserted->givePermissionTo($role['permissions']);
            }

            // Set permission for Staff role:
            if ($role['name'] == Constant::ROLE_STAFF) {
                $roleInserted->givePermissionTo($role['permissions']);
            }
        }
    }
}
