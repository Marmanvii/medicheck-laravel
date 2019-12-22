<?php

use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    public function run()
    {
        DB::table('infos')->insert([
            'titulo' => 'Ut tincidunt sit amet odio quis tempor',
            'autor' => 'Sed fermentum',
            'cuerpo' => 'Mauris nulla lectus, vehicula a nulla ut, ornare congue elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet rutrum dapibus. Nulla eget purus iaculis, feugiat tortor sed, tincidunt lacus. Pellentesque efficitur sagittis ornare. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam tristique viverra leo, eget pharetra magna luctus a. Cras efficitur orci quam, ut lobortis erat rutrum sed.',
            'foto' => 'images/default.png',
            'fecha' => date('2019-12-13'),
          ]);
          DB::table('infos')->insert([
            'titulo' => 'Morbi a euismod justo',
            'autor' => 'Nulla facilisi',
            'cuerpo' => 'Maecenas vel vestibulum urna. Aenean condimentum, ipsum eu accumsan volutpat, dui ex facilisis nibh, consectetur condimentum augue sapien eget metus. Suspendisse eu urna varius, pellentesque metus nec, tempor mi.',
            'foto' => 'images/default.png',
            'fecha' => date('2019-12-12'),
          ]);
          DB::table('infos')->insert([
            'titulo' => 'Phasellus feugiat arcu sit amet mollis vehicula',
            'autor' => 'Nam eu nisl tortor',
            'cuerpo' => 'Pellentesque tortor tortor, ornare a sem in, pulvinar ultrices diam. Aenean vel massa non est interdum mattis. Donec non quam tristique, consectetur risus a, interdum turpis.',
            'foto' => 'images/default.png',
            'fecha' => date('2019-12-13'),
          ]);
    }
}
