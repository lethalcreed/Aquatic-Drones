<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Add Roles
         *
         */
        if (Role::where('name', '=', 'Admin')->first() === null) {
            $adminRole = Role::create([
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Admin',
                'level' => 5,
            ]);
        }

        if (Role::where('name', '=', 'operator')->first() === null) {
            $userRole = Role::create([
                'name' => 'Operator',
                'slug' => 'operator',
                'description' => 'Operator',
                'level' => 1,
            ]);
        }

        if (Role::where('name', '=', 'Client')->first() === null) {
            $userRole = Role::create([
                'name' => 'Client',
                'slug' => 'client',
                'description' => 'Client',
                'level' => 0,
            ]);
        }

    }

}