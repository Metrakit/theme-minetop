<?php

namespace Minetop;

class PagesTableSeeder extends \Seeder {
        
    public function run()
    {
        \DB::table('pages')->delete();

        $t_fr = 'Bonjour';
        $t_en = 'Hello';

        // Page
        $name1 = new \I18n;
        $name1->i18n_type_id = \I18nType::where('name','=','name')->first()->id;
        $name1->save();
        $name1->translate('fr',$t_fr);
        $name1->translate('en',$t_en);
        
        $title1 = new \I18n;
        $title1->i18n_type_id = \I18nType::where('name','=','title')->first()->id;
        $title1->save();
        $title1->translate('fr',$t_fr);
        $title1->translate('en',$t_en);
        
        $url1 = new \I18n;
        $url1->i18n_type_id = \I18nType::where('name','=','url')->first()->id;
        $url1->save();
        $url1->translate('fr','/');
        $url1->translate('en','/');

        $meta_title1 = new \I18n;
        $meta_title1->i18n_type_id = \I18nType::where('name','=','meta_title')->first()->id;
        $meta_title1->save();
        $meta_title1->translate('fr',$t_fr);
        $meta_title1->translate('en',$t_en);

        $meta_description1 = new \I18n;
        $meta_description1->i18n_type_id = \I18nType::where('name','=','meta_description')->first()->id;
        $meta_description1->save();
        $meta_description1->translate('fr','Description '.$t_fr);
        $meta_description1->translate('en',$t_en.' Description');

        $structure1 = \Structure::create(array(
            'i18n_title'                => $title1->id,
            'i18n_url'                  => $url1->id,
            'i18n_meta_title'           => $meta_title1->id,
            'i18n_meta_description'     => $meta_description1->id,
            'structurable_id'           => 1,
            'structurable_type'         => 'Page'
        ));

        \DB::table('pages')->insert( 
            array(
            array(
                'i18n_name'         => $name1->id,
                'order'             => 1,
                'ancor'             => 'Home'
            ))
        );
    }

}
