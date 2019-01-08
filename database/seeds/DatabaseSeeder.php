<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $userAttr = [
            'password' => \Hash::make('p@ssw0rd'),
            'name' => 'admin',
            'email' => 'admin@admin.ro',
            'type' => 'admin'
        ];
        $user = \App\User::create($userAttr);

        $user->save();

        Model::reguard();
    }
}
