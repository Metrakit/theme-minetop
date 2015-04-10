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
	    $this->call('ResponsiveWidthsTableSeeder');
	    $this->call('ResponsiveTriggersTableSeeder');

	    //Users
	    $this->call('Minetop\AuthsTableSeeder');
	    $this->call('RolesTableSeeder');

	    $this->call('Minetop\AuthRoleTableSeeder');
	    $this->call('PermissionsTableSeeder');


	    $this->call('TaggablesTableSeeder');

	    //Pages
	    $this->call('Minetop\PagesTableSeeder');
	    $this->call('Minetop\BlocksTableSeeder');
	    //$this->call('BlockContentsTableSeeder');
	    //$this->call('BlockResponsiveTableSeeder');

	    $this->call('ViewsTableSeeder');

	    //Autonomous
	    $this->call('Minetop\ThemeTableSeeder');
	    $this->call('OptionsTableSeeder');

	}

}