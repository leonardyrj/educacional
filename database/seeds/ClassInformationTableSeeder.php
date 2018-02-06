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
        factory(\SON\Models\ClassInformation::class,50)->create();
    }
}
