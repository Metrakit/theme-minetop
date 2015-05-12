<?php

namespace Minetop;

class AuthsTableSeeder extends \Seeder {

    public function run()
    {
        \DB::table('auths')->delete();

        \DB::table('auths')->insert( array(
            array(
                'email'     => 'contact@jordane.net',
                'password'  => \Hash::make('admin'),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
                ),
            array(
                'email'     => 'jerejill@gmail.com',
                'password'  => \Hash::make('admin'),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
                ),
            )
        );

        \DB::table('users')->delete();

        \DB::table('users')->insert( array(
            array(
                'auth_id'    => 1,
                'pseudo'     => 'metrakit',
                'last_ip'    => '127.0.0.1',
                'last_login' => new \DateTime
            ),
            array(
                'auth_id'    => 2,
                'pseudo'     => 'jill',
                'last_ip'    => '127.0.0.1',
                'last_login' => new \DateTime
            ))
        );
    }

}
