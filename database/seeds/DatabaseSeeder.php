<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $this->call(TeachersTableSeeder::class);
        $this->call(ClassRoomTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
