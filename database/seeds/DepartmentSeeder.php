<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{

    public function run()
    {
      DB::table('departments')->insert([ // inserción de datos mediante las seeds
        'department' => 'Medicina General',
      ]);

    }
}
