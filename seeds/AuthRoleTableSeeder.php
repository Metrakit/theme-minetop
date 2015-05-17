<?php

namespace Minetop;

class AuthRoleTableSeeder extends \Seeder {


    public function run()
    {
        \DB::table('auth_role')->delete();

        $metrakit = \AuthUser::find(1)->id;
        $jill     = \AuthUser::find(2)->id;

        $admin_role = \Role::where('name', '=', 'admin')->first()->id;

        \DB::table('auth_role')->insert( array(
            array(
                'auth_id'    => $metrakit,
                'role_id'    => $admin_role
                ),
            array(
                'auth_id'    => $jill,
                'role_id'    => $admin_role
                )
            )
        );
    }

}