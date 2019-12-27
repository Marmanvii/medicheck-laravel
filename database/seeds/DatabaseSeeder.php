<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() #se define el órden en que se ejecutarán los seeders al ejecutar el comando correspondiente
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(InfoSeeder::class);
    }
}
