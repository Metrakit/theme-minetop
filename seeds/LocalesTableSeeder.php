<?php

namespace Minetop;

class LocalesTableSeeder extends \Seeder {

    public function run()
    {
        \DB::table('locales')->delete();

        \DB::table('locales')->insert( array(
            array(
                'id'            => 'de',
                'name_en'       => 'German',
                'name_locale'   => 'Deutsch',
                'flag'          => '//upload.wikimedia.org/wikipedia/commons/thumb/5/52/D-A-CH_Flag.svg/200px-D-A-CH_Flag.svg.png',
                'flag_w'        => '200',
                'flag_h'        => '133',
                'enable'        => 0,
                'on_admin'      => 0
            ),

            array(
                'id'            => 'fr',
                'name_en'       => 'French',
                'name_locale'   => 'Français',
                'flag'          => '//upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/200px-Flag_of_France.svg.png',
                'flag_w'        => '200',
                'flag_h'        => '133',
                'enable'        => 1,
                'on_admin'      => 1
            ),

            array(
                'id'            => 'en',
                'name_en'       => 'English',
                'name_locale'   => 'English',
                'flag'          => '//upload.wikimedia.org/wikipedia/commons/thumb/0/0b/English_language.svg/200px-English_language.svg.png',
                'flag_w'        => '200',
                'flag_h'        => '105',
                'enable'        => 0,
                'on_admin'      => 1
            ),

            array(
                'id'            => 'it',
                'name_en'       => 'Italian',
                'name_locale'   => 'Italiano',
                'flag'          => '//upload.wikimedia.org/wikipedia/en/thumb/0/03/Flag_of_Italy.svg/200px-Flag_of_Italy.svg.png',
                'flag_w'        => '200',
                'flag_h'        => '133',
                'enable'        => 0,
                'on_admin'      => 0
            ),

            array(
                'id'            => 'es',
                'name_en'       => 'Spanish',
                'name_locale'   => 'Español',
                'flag'          => '//upload.wikimedia.org/wikipedia/commons/thumb/3/32/Flag_of_Spain_%28Civil%29.svg/200px-Flag_of_Spain_%28Civil%29.svg.png',
                'flag_w'        => '200',
                'flag_h'        => '133',
                'enable'        => 0,
                'on_admin'      => 1
            ),

            array(
                'id'            => 'pt',
                'name_en'       => 'Portuguese',
                'name_locale'   => 'Português',
                'flag'          => '//upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Flags_of_Brazil_and_Portugal.svg/200px-Flags_of_Brazil_and_Portugal.svg.png',
                'flag_w'        => '200',
                'flag_h'        => '140',
                'enable'        => 0,
                'on_admin'      => 1
            ),

            array(
                'id'            => 'ru',
                'name_en'       => 'Russian',
                'name_locale'   => 'Русский',
                'flag'          => '//upload.wikimedia.org/wikipedia/en/thumb/f/f3/Flag_of_Russia.svg/200px-Flag_of_Russia.svg.png',
                'flag_w'        => '200',
                'flag_h'        => '133',
                'enable'        => 0,
                'on_admin'      => 0
            ),

            array(
                'id'            => 'zh',
                'name_en'       => 'Chinese',
                'name_locale'   => '中文',
                'flag'          => '//upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Han_Chinese_flag.svg/120px-Han_Chinese_flag.svg.png',
                'flag_w'        => '120',
                'flag_h'        => '130',
                'enable'        => 0,
                'on_admin'      => 0
            ))
        );
    }
}