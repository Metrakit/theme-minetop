<?php

namespace Minetop;

class AuthsTableSeeder extends \Seeder {

    public function run()
    {
        \DB::table('auths')->delete();

        \DB::table('auths')->insert( array(
            array(
                'email'     => 'contact@jordane.net',
                'password'  => \Hash::make('admin')
                )
            )
        );
    }

}
