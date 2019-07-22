<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrTeachers = [
            'Emily',
            'Isabella'
        ];

        $faker = Faker::create('en_UK');
        $date = date('Y-m-d H:i:s');
        DB::table('tbl_teachers')->truncate();


        foreach($arrTeachers As $teacher){

            DB::table('tbl_teachers')->insert([
                'first_name' => $teacher,
                'last_name' => $faker->name,
                'email'=>strtolower($teacher).'@gmail.com',
                'telephone' => $faker->phoneNumber,
                'created_at' => $date,
                'updated_at' => $date
            ]);

        }
    }
}
