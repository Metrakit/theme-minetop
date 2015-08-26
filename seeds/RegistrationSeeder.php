<?php

namespace Minetop;

class RegistrationSeeder extends \Seeder {

    public function run()
    {

        // Create resource - display in menu  
        $resource = \Resource::create(
            array(
                'name' => 'registration',
                'icon' => 'glyphicon glyphicon-user',
                'model' => 'Register',
                'in_admin_ui'   => true,
                'navigable'     => false,
                'admin_navigation_group_id'         => 4
            )
        );

        $roles = array();
        $roles[0] = \Role::where('name','=','admin')->first()->id;
        $actions = array();
        $actions[0]  = \Action::where('name','=','manage')->first()->id;
        \Permission::create(array(
            'role_id'       => $roles[0],
            'type'          => 'allow',
            'action_id'     => $actions[0],
            'resource_id'   => $resource->id,           
        ));


        // Options
        \DB::table('options')->insert( array(
            array(
                'key'         => 'registration_extended',
                'value'       => null,
            ),
            array(
                'key'         => 'enable_registration',
                'value'       => true,
            ),
            array(
                'key'         => 'facebook_registration',
                'value'       => true,
            ),
            array(
                'key'         => 'facebook_id',
                'value'       => $_ENV['FACEBOOK_ID'],
            ),
            array(
                'key'         => 'facebook_secret',
                'value'       => $_ENV['FACEBOOK_SECRET'],
            ),
             array(
                'key'         => 'google_registration',
                'value'       => true,
            ),
            array(
                'key'         => 'google_id',
                'value'       => $_ENV['GOOGLE_ID'],
            ),
            array(
                'key'         => 'google_secret',
                'value'       => $_ENV['GOOGLE_SECRET'],
            ),             
             array(
                'key'         => 'github_registration',
                'value'       => true,
            ), 
            array(
                'key'         => 'github_id',
                'value'       => $_ENV['GITHUB_ID'],
            ),
            array(
                'key'         => 'github_secret',
                'value'       => $_ENV['GITHUB_SECRET'],
            ),             
            array(
                'key'         => 'linkedin_registration',
                'value'       => false,
            ), 
            array(
                'key'         => 'linkedin_id',
                'value'       => null,
            ),
            array(
                'key'         => 'linkedin_secret',
                'value'       => null,
            ),             
            array(
                'key'         => 'instagram_registration',
                'value'       => false,
            ),  
            array(
                'key'         => 'instagram_id',
                'value'       => null,
            ),
            array(
                'key'         => 'instagram_secret',
                'value'       => null,
            ),
            array(
                'key'         => 'disqus_registration',
                'value'       => true,
            ),
            array(
                'key'         => 'disqus_id',
                'value'       => $_ENV['DISQUS_ID'],
            ),
            array(
                'key'         => 'disqus_secret',
                'value'       => $_ENV['DISQUS_SECRET'],
            ),

        ));

    }

}