<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User as User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Eric Kennedy",
            "email" => "eric_kps@hotmail.com",
            "foto_perfil" => "me_contrata.jpg",
            "password" => Hash::make("SenhaMegaSegura_1")
        ]);

        User::create([
            "name" => "Wellmmer",
            "email" => "wellmmer@wedclub.com.br",
            "foto_perfil" => "6b4fc82df8aaac3514ce51fdc46e123c.jpg",
            "password" => Hash::make("SenhaMegaSegura_2")
        ]);

        User::create([
            "name" => "João Henrique Sass",
            "email" => "joao@wedclub.com.br",
            "foto_perfil" => "93067e551add9e3212a7eefd64e1b740.jpg",
            "password" => Hash::make("SenhaMegaSegura_3")
        ]);

        User::create([
            "name" => "WedClass",
            "email" => "contato@wedclass.com.br",
            "foto_perfil" => "471f74141d091e17bfe150121f38ebba.jpg",
            "password" => Hash::make("SenhaMegaSegura_4")
        ]);

        User::create([
            "name" => "Rafaelle Cameron",
            "email" => "rafaelle@wedclub.com.br",
            "foto_perfil" => "667eb01a09389fe778c777b204d9367e.jpg",
            "password" => Hash::make("SenhaMegaSegura_5")
        ]);
    
        User::create([
            "name" => "Giovanna Luques",
            "email" => "giovana@wedclub.com.br",
            "foto_perfil" => "3c7e04fc35c4a8a620c489d0f074ab0f.jpg",
            "password" => Hash::make("SenhaMegaSegura_6")
        ]);

        User::create([
            "name" => "Fernando Terra",
            "email" => "fernando@wedclub.com.br",
            "foto_perfil" => "02f0fe67e1b5fcd041ba0db5103f5cce.jpg",
            "password" => Hash::make("SenhaMegaSegura_7")
        ]);

        User::create([
            "name" => "Danilo Dellalibera",
            "email" => "danilo@wedclub.com.br",
            "foto_perfil" => "213e05ea7866432a8224c3db57b28be8.jpg",
            "password" => Hash::make("SenhaMegaSegura_8")
        ]);

        User::create([
            "name" => "Leandro Terra",
            "email" => "leandro@wedclub.com.br",
            "foto_perfil" => "abdb60f3bafdfaa1ffdc9e37f606ea62.jpg",
            "password" => Hash::make("SenhaMegaSegura_9")
        ]);

        User::create([
            "name" => "Viviane Plens",
            "email" => "viviane@wedclub.com.br",
            "foto_perfil" => "f4d748b5ec74022dbab1b9d192dce356.jpg",
            "password" => Hash::make("SenhaMegaSegura_10")
        ]);

        User::create([
            "name" => "Marinho Mattarazzo",
            "email" => "marinho@wedclub.com.br",
            "foto_perfil" => "d3142e6f74acaf2e8e475746805c0076.jpg",
            "password" => Hash::make("SenhaMegaSegura_11")
        ]);
        
    }
}
