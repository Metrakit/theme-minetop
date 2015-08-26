<?php 

namespace Minetop;

class DatabaseSeeder extends \Seeder {
    public function run()
    {
    	\Eloquent::unguard();

        //Resources
        $this->call('Minetop\LocalesTableSeeder');
        $this->call('ActionsTableSeeder');
        $this->call('ResourcesTableSeeder');
        $this->call('I18nTypesTableSeeder');

        $this->call('NavigationsTableSeeder');

        $this->call('Minetop\I18nSeeder');
        //$this->call('ResponsiveWidthsTableSeeder');
        //$this->call('ResponsiveTriggersTableSeeder');

        //Users
        $this->call('Minetop\AuthsTableSeeder');
        $this->call('RolesTableSeeder');

        $this->call('Minetop\AuthRoleTableSeeder');
        $this->call('PermissionsTableSeeder');

        $this->call('TaggablesTableSeeder');
        
        //OnePage
        $this->call('Minetop\OnePagesTableSeeder');

	    $this->call('Minetop\PagesTableSeeder');
	    $this->call('Minetop\BlocksTableSeeder');

        //Forms
        $this->call('ViewsTableSeeder');

        //Autonomous
        $this->call('Minetop\ThemeTableSeeder');
        $this->call('Minetop\OptionsTableSeeder');

        $this->call('Minetop\RegistrationSeeder');
	}

}