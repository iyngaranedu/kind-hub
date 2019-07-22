<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UK');
        $date = date('Y-m-d H:i:s');
        DB::table('tbl_students')->truncate();

        $path = storage_path('data/students_records.csv');

        $file = fopen($path,"r");
        while(! feof($file))
        {
            $record_row = fgetcsv($file);

            $class_room = $record_row[0];
            $teachers_name = $record_row[1];
            $student_firstname = $record_row[2];
            $student_lastname = $record_row[3];
            $gender = $record_row[4];
            $joined_year = $record_row[5];

            $class_room_data = DB::table('tbl_class_rooms')
                ->where('name', $class_room)
                ->where('class_year', $joined_year)
                ->first();

            if(isset($class_room_data)){
                $class_room_id = $class_room_data->id;

                DB::table('tbl_students')->insert([
                    'first_name' => $student_firstname,
                    'last_name' => $student_lastname,
                    'gender'=>$gender,
                    'tbl_class_room_id' => $class_room_id,
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
            }

        }

        fclose($file);
    }
}
