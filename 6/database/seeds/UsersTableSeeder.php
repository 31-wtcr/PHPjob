<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i < 4; $i++) { 
            $user = new \App\User([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@example.test',
                'password' => bcrypt('userpass' . $i )
            ]);
            $user->save();
        }
    }
}
