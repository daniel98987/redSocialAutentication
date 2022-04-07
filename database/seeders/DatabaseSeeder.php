<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $arrayDeUsuarios = array(
	
      array(

        'nickname' => 'dani22', 
        'name' => 'Daniel Alejandro', 
        'surnames' => 'Zambrano Portilla', 
        'email' => "daniel@gmail.com", 
        'password' => 'hola'
      ),
        array(
  
        'nickname' => 'hugo122', 
        'name' => 'Hugo Fernando', 
        'surnames' => 'Zambrano Mora', 
        'email' => "hugo@gmail.com", 
        'password' => 'hola'
      ),
      array(
  
        'nickname' => 'yuli122', 
        'name' => 'Yuliana Alejandra', 
        'surnames' => 'Morales Torres', 
        'email' => "yuliana@gmail.com", 
        'password' => 'hola'
      ), array(
  
        'nickname' => 'santi22', 
        'name' => 'Santiago Rosero', 
        'surnames' => 'Morales Federico', 
        'email' => "santiagsdo@gmail.com", 
        'password' => 'hola'
      ), array(
  
        'nickname' => 'camti22', 
        'name' => 'Marcela Rosero', 
        'surnames' => 'Morales Federico', 
        'email' => "santiafafgo@gmail.com", 
        'password' => 'hola'
      ), array(
  
        'nickname' => 'JUanRosero', 
        'name' => 'JUanRosero', 
        'surnames' => 'Morales Federico', 
        'email' => "JUanRosesro@gmail.com", 
        'password' => 'hola'
      ), array(
  
        'nickname' => 'mora22', 
        'name' => 'mora22 Rosero', 
        'surnames' => 'mora22 Federico', 
        'email' => "mora22sd@gmail.com", 
        'password' => 'hola'
      )
	);
  
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        self::seedCatalog(); 
        $this->command->info('Tabla catálogo inicializada con datos!');
    }
    
      function seedCatalog()
    {
  
        // \App\Models\User::factory(10)->create();
        DB::table('users')->delete();
        foreach( $this->arrayDeUsuarios as $usuario ) {
            $p = new User();
            $p->nickname = $usuario['nickname'];
            $p->name = $usuario['name'];
            $p->surnames = $usuario['surnames'];
            $p->email = $usuario['email'];
            $p->password =  bcrypt( $usuario['password']);;
            $p->save();
      }
    }
}
