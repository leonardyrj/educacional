<?php

use Illuminate\Database\Seeder;
use SON\Models\User;
use SON\Models\UserProfile;


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
            $profile = factory(UserProfile::class)->make();
            $user->profile()->create($profile->toArray());
            User::assignRole($user, User::ROLE_ADMIN);
            $user->save();
        });

        factory(\SON\Models\User::class)->create([
            'email' => 'teacher@user.com',
            'enrolment' => 400000,
            'password' => bcrypt('secret')
        ])->each(function(User $user){
            $profile = factory(UserProfile::class)->make();
            $user->profile()->create($profile->toArray());
            User::assignRole($user, User::ROLE_TEACHER);
            $user->save();
        });

        factory(User::class,10)->create()->each(function(User $user){
            if(!$user->userable) {
                $profile = factory(UserProfile::class)->make();
                $user->profile()->create($profile->toArray());
                User::assignRole($user, User::ROLE_TEACHER);
                User::assignEnrolment(new User(), User::ROLE_TEACHER);
                $user->save();
            }
        });

        factory(User::class,100)->create()->each(function(User $user){
            if(!$user->userable) {
                $profile = factory(UserProfile::class)->make();
                $user->profile()->create($profile->toArray());
                User::assignRole($user, User::ROLE_STUDENT);
                User::assignEnrolment(new User(), User::ROLE_STUDENT);
                $user->save();
            }
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
