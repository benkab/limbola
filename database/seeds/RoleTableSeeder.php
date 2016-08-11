<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$role_admin 				= new Role();
        $role_admin->name 			= 'Admin';
        $role_admin->description 	= 'The administrator';
        $role_admin->save();

        $role_visitor 				= new Role();
        $role_visitor->name 		= 'Visitor';
        $role_visitor->description 	= 'A normal visitor';
        $role_visitor->save();

        $role_author 				= new Role();
        $role_author->name 			= 'Author';
        $role_author->description 	= 'A team member';
        $role_author->save();

    }
}
