<?php

namespace Minetop;

class AuthsTableSeeder extends \Seeder {

    public function run()
    {
        \DB::table('auths')->delete();

        \DB::table('auths')->insert( array(
            array(
                'email'     => 'd.lepaux@gmail.com',
                'password'  => \Hash::make('admin'),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
                ),
            array(
                'email'     => 'contact@jordane.net',
                'password'  => \Hash::make('admin'),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
                ),
            array(
                'email'     => 'm.ator@gmail.com',
                'password'  => \Hash::make('moderator'),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
                ),
            array(
                'email'     => 'jerejill@gmail.com',
                'password'  => \Hash::make('admin'),
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
                ),
            array(
                'email'     => 'kevin.meissonnier@gmail.com',
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
                'pseudo'     => 'david',
                'last_ip'    => '127.0.0.1',
                'last_login' => new \DateTime
            ),
            array(
                'auth_id'    => 2,
                'pseudo'     => 'metrakit',
                'last_ip'    => '127.0.0.1',
                'last_login' => new \DateTime
            ),
            array(
                'auth_id'    => 3,
                'pseudo'     => 'mator',
                'last_ip'    => '127.0.0.1',
                'last_login' => new \DateTime
            ),
            array(
                'auth_id'    => 4,
                'pseudo'     => 'jill',
                'last_ip'    => '127.0.0.1',
                'last_login' => new \DateTime
            ),
            array(
                'auth_id'    => 5,
                'pseudo'     => 'kevin',
                'last_ip'    => '127.0.0.1',
                'last_login' => new \DateTime
            ))
        );
    }

}
