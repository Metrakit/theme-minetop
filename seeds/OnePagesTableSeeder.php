<?php

namespace Minetop;

class OnePagesTableSeeder extends \Seeder {

    public function run()
    {
        //Background_types
        \DB::table('background_types')->delete();

        \DB::table('background_types')->insert( array(
            array(
                'name'       => 'image'
            ),
            array(
                'name'       => 'video'
            )
        ));    

        //Background_positions
        \DB::table('background_positions')->delete();

        \DB::table('background_positions')->insert( array(
            array(
                'name'       => 'relative'
            ),
            array(
                'name'       => 'fixed'
            )
        ));     
    }

}
