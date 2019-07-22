<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ClassRoomTableSeeder extends Seeder
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

        $arrClassRooms = [
            [
                'class'=>'A',
                'year_n'=> '2019',
                'teacher' => 1
            ],
            [
                'class'=>'C',
                'year_n'=> '2018',
                'teacher' => 2
            ],
            [
                'class'=>'B',
                'year_n'=> '2019',
                'teacher' => 1
            ],
            [
                'class'=>'A',
                'year_n'=> '2018',
                'teacher' => 1
            ],
            [
                'class'=>'A',
                'year_n'=> '2017',
                'teacher' => 1
            ],
            [
                'class'=>'B',
                'year_n'=> '2018',
                'teacher' => 1
            ],
            [
                'class'=>'C',
                'year_n'=> '2019',
                'teacher' => 2
            ],
            [
                'class'=>'B',
                'year_n'=> '2017',
                'teacher' => 1
            ],
            [
                'class'=>'C',
                'year_n'=> '2017',
                'teacher' => 2
            ],
        ];

        $faker = Faker::create('en_UK');
        $date = date('Y-m-d H:i:s');
        DB::table('tbl_class_rooms')->truncate();
        foreach($arrClassRooms As $classRoom){

            DB::table('tbl_class_rooms')->insert([
                'name' => $classRoom['class'],
                'class_year' => $classRoom['year_n'],
                'tbl_teacher_id'=>$classRoom['teacher'],
                'created_at' => $date,
                'updated_at' => $date
            ]);

        }
    }
}
