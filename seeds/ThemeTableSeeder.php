<?php

namespace Minetop;

class ThemeTableSeeder extends \Seeder {
    public function run()
    {
        \DB::table('themes')->delete();

        \DB::table('themes')->insert( array(
            array(
                'name'      => 'default',
                'type'      => 'public',
                'active'    => false
            ),
            array(
                'name'      => 'default',
                'type'      => 'admin',
                'active'    => true
            ),
            array(
                'name'      => 'theme-minetop',
                'type'      => 'public',
                'active'    => true
            ))
        );

    }
}