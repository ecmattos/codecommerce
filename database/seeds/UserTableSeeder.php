<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use CodeCommerce\User;

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create(
            [
                'name' => "Eduardo",
                'email' => "ecmattos@ig.com.br",
                'password' => Hash::make(280770)

            ]);

        $faker = Faker::create();

        foreach(range(1,10) as $i)
        {
            User::create(
            [
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->word)

            ]);
        }
    }
}