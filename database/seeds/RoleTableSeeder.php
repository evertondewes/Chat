<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chat\Role::updateOrCreate(['name' => 'Administrador'], ['name' => 'Administrador', 'description' => 'Permissão para excluir mensagens.'])->save();

        Chat\Role::updateOrCreate(['name' => 'Escritor'], ['name' => 'Escritor', 'description' => 'Permissão para escrever mensagens.'])->save();

        Chat\Role::updateOrCreate(['name' => 'Leitor'], ['name' => 'Leitor', 'description' => 'Permissão apenas para ler as mensagens.'])->save();

    }
}
