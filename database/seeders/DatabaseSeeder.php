<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $status = array('planejando', 'executando', 'concluido', 'cancelado');
        DB::table('users')->insert([
            'name' => 'Epaminondas',
            'email' => 'epaminondas@ananias.com',
            'password' => Hash::make('123'),
            'admin' => 1,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Ravioli',
            'email' => 'ravioli@caloria.com',
            'password' => Hash::make('123'),
            'admin' => 0,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Rondelli',
            'email' => 'rondelli@caloria.com',
            'password' => Hash::make('123'),
            'admin' => 0,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tags')->insert([
            'nome' => 'ASSEIO'
        ]);
        DB::table('tags')->insert([
            'nome' => 'COZINHA'
        ]);
        DB::table('tags')->insert([
            'nome' => 'ESTUDO'
        ]);
        DB::table('tags')->insert([
            'nome' => 'EXERCÍCIO'
        ]);
        DB::table('tags')->insert([
            'nome' => 'FAXINA'
        ]);
        DB::table('tags')->insert([
            'nome' => 'TRABALHO'
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Preparar o almoço',
            'descricao' => 'Cozinhar 95 pratos diferentes',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Limpar a cela acolchoada',
            'descricao' => 'Aspirar e passar pano',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Fazer flexões em gravidade zero',
            'descricao' => '3 séries de 10',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Passear com a iguana',
            'descricao' => 'Andar em círculos e pulando',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Caçar tatu',
            'descricao' => 'Levar iscas e CD do Amado Batista',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Estudar programação',
            'descricao' => 'Aprender todas as linguagens de programação do planeta pra conseguir um cargo de sênior que paga 2 salários mínimos',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Consertar o capacitor de fluxo',
            'descricao' => 'O tempo não para, não para não',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Remover cravos',
            'descricao' => 'Use óleo fervente, martelo e pregos',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Pentear macaco',
            'descricao' => 'Coloca alprazolam na comida dele senão ele te morde e foge',
            'status' => $status[rand(0,3)],
        ]);
        DB::table('tarefas')->insert([
            'nome' => 'Enxugar gelo',
            'descricao' => 'Com os melhores panos de prato da sua casa',
            'status' => $status[rand(0,3)],
        ]);
        $tags = range(1,6);
        for ($i=1; $i <= 10; $i++) {
            $limite = rand(0,5);
            shuffle($tags);
            for ($j=0; $j <= $limite; $j++) {
                DB::table('tag_tarefa')->insert([
                    'tag_id' => $tags[$j],
                    'tarefa_id' => $i,
                ]);
            }
        }
        $users = range(1,3);
        for ($i=1; $i <= 10; $i++) {
            $limite = rand(0,2);
            shuffle($users);
            for ($j=0; $j <= $limite; $j++) {
                DB::table('tarefa_user')->insert([
                    'user_id' => $users[$j],
                    'tarefa_id' => $i,
                ]);
            }
        }
    }
}
