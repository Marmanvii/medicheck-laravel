<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{

    public function run()
    {
      DB::table('schedules')->insert([ // inserción de datos mediante las seeds
        'medics_id' => '2',
        'lunes' => '1',
        'martes' => '2',
        'miercoles' => '3',
        'jueves' => '0',
        'viernes' => '0',
        'duracion' => '20',
      ]);
    }
}
