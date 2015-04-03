<?php
class ThemeMinetopSeeder extends Seeder {
    public function run()
    {
    	// Put theme in db
        DB::table('themes')->insert( array(
            array(
                'name'    	=> 'theme-minetop',
                'type'    	=> 'public',
                'active'    	=> false
            ))
        );
    }
}