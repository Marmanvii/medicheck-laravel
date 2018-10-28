<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
      DB::table('users')->insert([ // inserción de datos mediante las seeds
        'rut' => '0.000.000-0',
        'name' => 'Admin',
        'last_name' => 'Admin',
        'email' => 'admin@medica.cl',
        'password' => bcrypt('123456'),
        'type' => 'admin',
        'valor' => '0',
      ]);

      DB::table('users')->insert([
        'rut' => '1.111.111-1',
        'name' => 'Doctor',
        'last_name' => 'Doctor 1',
        'email' => 'doctor@medica.cl',
        'password' => bcrypt('123456'),
        'type' => 'medic',
        'department_id' => '1',
        'valor' => '12500',
      ]);

      DB::table('users')->insert([
        'rut' => '2.222.222-2',
        'name' => 'Secretaria',
        'last_name' => 'Secretaria',
        'email' => 'secre@medica.cl',
        'password' => bcrypt('123456'),
        'type' => 'secre',
        'valor' => '0',
      ]);

      DB::table('users')->insert([
        'rut' => '3.333.333-3',
        'name' => 'Paciente',
        'last_name' => 'Paciente 1',
        'email' => 'paciente1@medica.cl',
        'password' => bcrypt('123456'),
        'type' => 'user',
        'valor' => '0',
      ]);
      DB::table('users')->insert([
        'rut' => '4.444.444-4',
        'name' => 'Paciente',
        'last_name' => 'Paciente 2',
        'email' => 'paciente2@medica.cl',
        'password' => bcrypt('123456'),
        'type' => 'user',
        'valor' => '0',
      ]);
    }
}
