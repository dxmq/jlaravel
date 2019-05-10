<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminInitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ###############
        $userData = [
            'name' => 'admin',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ];
        DB::table('admin_users')->insert($userData);

        // ################
        $roleData = [
            [
                'name' => 'sys-manager',
                'description' => '系统管理员',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'name' => 'post-manager',
                'description' => '文章管理员',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'name' => 'topic-manager',
                'description' => '专题管理员',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'name' => 'notice-manager',
                'description' => '通知管理员',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ]
        ];
        DB::table('admin_roles')->insert($roleData);

        // ##############
        $permissionData = [
            [
                'name' => 'system',
                'description' => '系统管理',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'name' => 'posts',
                'description' => '文章管理',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'name' => 'topics',
                'description' => '专题管理',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'name' => 'notice',
                'description' => '通知管理',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];
        DB::table('admin_permissions')->insert($permissionData);

        // ############
        $roleUserData = [
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
            [
                'user_id' => 1,
                'role_id' => 2,
            ],
            [
                'user_id' => 1,
                'role_id' => 3,
            ],
            [
                'user_id' => 1,
                'role_id' => 4,
            ],
        ];
        DB::table('admin_role_users')->insert($roleUserData);

        $rolePermissionData = [
            [
                'role_id' => 1,
                'permission_id' => 1,
            ],
            [
                'role_id' => 2,
                'permission_id' => 2,
            ],
            [
                'role_id' => 3,
                'permission_id' => 3,
            ],
            [
                'role_id' => 4,
                'permission_id' => 4,
            ],
        ];
        DB::table('admin_role_permissions')->insert($rolePermissionData);
    }
}
