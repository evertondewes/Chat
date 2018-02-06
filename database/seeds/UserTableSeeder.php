<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chat\User::updateOrCreate(['name' => 'Administrador'], [
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'role_id' => \Chat\Role::where('name', 'Administrador')->first()->id,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ])->save();

        factory('Chat\User', 50)->create();
    }
}
