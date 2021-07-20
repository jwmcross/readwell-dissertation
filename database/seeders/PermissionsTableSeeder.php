<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'family_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'nursery_register_access',
            ],
            [
                'id'    => 21,
                'title' => 'child_create',
            ],
            [
                'id'    => 22,
                'title' => 'child_edit',
            ],
            [
                'id'    => 23,
                'title' => 'child_show',
            ],
            [
                'id'    => 24,
                'title' => 'child_delete',
            ],
            [
                'id'    => 25,
                'title' => 'child_access',
            ],
            [
                'id'    => 26,
                'title' => 'carer_create',
            ],
            [
                'id'    => 27,
                'title' => 'carer_edit',
            ],
            [
                'id'    => 28,
                'title' => 'carer_show',
            ],
            [
                'id'    => 29,
                'title' => 'carer_delete',
            ],
            [
                'id'    => 30,
                'title' => 'carer_access',
            ],
            [
                'id'    => 31,
                'title' => 'session_create',
            ],
            [
                'id'    => 32,
                'title' => 'session_edit',
            ],
            [
                'id'    => 33,
                'title' => 'session_show',
            ],
            [
                'id'    => 34,
                'title' => 'session_delete',
            ],
            [
                'id'    => 35,
                'title' => 'session_access',
            ],
            [
                'id'    => 36,
                'title' => 'register_create',
            ],
            [
                'id'    => 37,
                'title' => 'register_edit',
            ],
            [
                'id'    => 38,
                'title' => 'register_show',
            ],
            [
                'id'    => 39,
                'title' => 'register_delete',
            ],
            [
                'id'    => 40,
                'title' => 'register_access',
            ],
            [
                'id'    => 41,
                'title' => 'booking_create',
            ],
            [
                'id'    => 42,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 43,
                'title' => 'booking_show',
            ],
            [
                'id'    => 44,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 45,
                'title' => 'booking_access',
            ],
            [
                'id'    => 46,
                'title' => 'family_create',
            ],
            [
                'id'    => 47,
                'title' => 'family_edit',
            ],
            [
                'id'    => 48,
                'title' => 'family_show',
            ],
            [
                'id'    => 49,
                'title' => 'family_delete',
            ],
            [
                'id'    => 50,
                'title' => 'family_access',
            ],
            [
                'id'    => 51,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
