<?php

use Illuminate\Database\Seeder;

class ClassInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = \SON\Models\Student::all();

        factory(\SON\Models\ClassInformation::class,50)->create()
        ->each(function(\SON\Models\ClassInformation $model) use ($student){
            $studentCol = $student->random(10);
            $model->students()->attach($studentCol->pluck('id'));
        });
    }
}
