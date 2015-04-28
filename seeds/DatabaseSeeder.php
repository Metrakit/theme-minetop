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
        $this->call('I18nSeeder');
        //$this->call('FileTypesTableSeeder');
        //$this->call('FilesTableSeeder');
        $this->call('ResponsiveWidthsTableSeeder');
        $this->call('ResponsiveTriggersTableSeeder');
        //$this->call('SocialsTableSeeder');
        //$this->call('ImagesTableSeeder');


        //Users
        $this->call('Minetop\AuthsTableSeeder');
        $this->call('RolesTableSeeder');

        $this->call('AuthRoleTableSeeder');
        $this->call('PermissionsTableSeeder');


        //Blogs
        //$this->call('BlogsTableSeeder');
        //$this->call('ArticlesTableSeeder');
        //$this->call('TagsTableSeeder');
        //$this->call('ArticleCategoriesTableSeeder');

        //$this->call('ArticleBlogTableSeeder');
        //$this->call('ArticleCategoryTableSeeder');
        $this->call('TaggablesTableSeeder');
        
        //OnePage
        $this->call('OnePagesTableSeeder');

        //Pages
        /*$this->call('PagesTableSeeder');
        $this->call('BlocksTableSeeder');*/

	    $this->call('Minetop\PagesTableSeeder');
	    $this->call('Minetop\BlocksTableSeeder');


       /* $this->call('BlockContentsTableSeeder');
        $this->call('BlockResponsiveTableSeeder');*/



        //Forms
        //$this->call('PagesTableSeeder');
        $this->call('ViewsTableSeeder');
        //$this->call('DatasTableSeeder');
        //$this->call('DataViewTableSeeder');
        //$this->call('MapsTableSeeder');
        
        // ONLY FOR DEVELOPMENT
        /*$this->call('FullFormSeeder');
        $this->call('CommentsTableSeeder');*/


        //Sliders
        //$this->call('SlidersTableSeeder');
        //$this->call('SlidesTableSeeder');

        //Menu
        //$this->call('NavigationsTableSeeder');//Need Page module OK

        //Task
        //$this->call('TasksTableSeeder');


        //Autonomous
        $this->call('Minetop\ThemeTableSeeder');
        $this->call('OptionsTableSeeder');


	}

}