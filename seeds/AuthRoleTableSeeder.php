<?php

namespace Minetop;

class AuthRoleTableSeeder extends \Seeder {


    public function run()
    {
        \DB::table('auth_role')->delete();

        $auth_id1 = \AuthUser::first()->id;
        \Log::info($auth_id1);
        $role_id = \Role::where('name','=','admin')->first()->id;

        \DB::table('auth_role')->insert( array(
            array(
                'auth_id'    => $auth_id1,
                'role_id'    => $role_id
                )
            )
        );
    }

}
