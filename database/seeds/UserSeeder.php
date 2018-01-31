<?php

use Illuminate\Database\Seeder;
use SON\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SON\Models\User::class)->create([
            'email' => 'admin@user.com',
            'enrolment' => 100001,
            'password' => bcrypt('secret')
        ])->each(function(User $user){
            User::assignRole($user, User::ROLE_ADMIN);
            $user->save();
        });

//        factory(User::class,1)->create([
//            'password' => bcrypt('secret')
//        ])->each(function(User $user){
//            if(!$user->userable) {
//                User::assignRole($user, User::ROLE_TEACHER);
//                User::assignEnrolment(new User(), User::ROLE_TEACHER);
//                $user->save();
//            }
//        });
//
//        factory(User::class,1)->create([
//            'password' => bcrypt('secret')
//        ])->each(function(User $user){
//            if(!$user->userable) {
//                User::assignRole($user, User::ROLE_STUDENT);
//                User::assignEnrolment(new User(), User::ROLE_STUDENT);
//                $user->save();
//            }
//        });
    }
}
