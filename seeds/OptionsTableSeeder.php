<?php

namespace Minetop;

class OptionsTableSeeder extends \Seeder {

    public function run()
    {
        \DB::table('options')->delete();
        
        $i18n_site_name = \I18n::add(array('fr' => 'Minetop', 'en'=>'Minetop'), 'title');
        $i18n_blog_charset = \I18n::add(array('fr' => 'UTF-8', 'en'=>'UTF-8'), 'title');
        $i18n_timezone = \I18n::add(array('fr' => 'Europe/Paris', 'en'=>'Europe/Paris'), 'title');
        $i18n_date_format = \I18n::add(array('fr' => 'j F Y', 'en'=>'j F Y'), 'title');
        $i18n_time_format = \I18n::add(array('fr' => 'G \h i \m\i\n', 'en'=>'G \h i \m\i\n'), 'title');
        $i18n_social_title = \I18n::add(array('fr' => '', 'en'=>''), 'title');
        $i18n_social_description = \I18n::add(array('fr' => '', 'en'=>''), 'title');

        \DB::table('options')->insert( array(
            array(
                'key'         => 'site_url',
                'value'       => 'http://minetop.net',  
            ),
            array(
                'key'         => 'i18n_site_name',
                'value'       => $i18n_site_name,  
            ),
            array(
                'key'         => 'admin_email',
                'value'       => 'contact@minetop.net',  
            ),
            array(
                'key'         => 'cover_path',
                'value'       => null,  
            ),
            array(
                'key'         => 'twitter_id',
                'value'       => null,
            ),
            array(
                'key'         => 'i18n_social_title',
                'value'       => $i18n_social_title,  
            ),
            array(
                'key'         => 'i18n_social_description',
                'value'       => $i18n_social_description,  
            ),
            array(
                'key'         => 'mailserver_url',
                'value'       => null,
            ),
            array(
                'key'         => 'mailserver_login',
                'value'       => null,
            ),
            array(
                'key'         => 'mailserver_pass',
                'value'       => null,
            ),
            array(
                'key'         => 'mailserver_port',
                'value'       => null,
            ),
            array(
                'key'         => 'i18n_blog_charset',
                'value'       => $i18n_blog_charset,  
            ),
            array(
                'key'         => 'i18n_timezone',
                'value'       => $i18n_timezone,  
            ),
            array(
                'key'         => 'i18n_date_format',
                'value'       => $i18n_date_format,  
            ),
            array(
                'key'         => 'i18n_time_format',
                'value'       => $i18n_time_format,  
            ),
            array(
                'key'         => 'disqus_config',
                'value'       => null,
            ),
            array(
                'key'         => 'analytics',
                'value'       => null,
            ),
        ));

    }

}