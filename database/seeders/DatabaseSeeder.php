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
			'email' => "dzambrano863@gmail.com", 
			'password' => 'daniel'
		),
		array(

			'nickname' => 'hugo12', 
			'name' => 'Hugo Andrés', 
			'surnames' => 'Pantoja Benavides', 
			'email' => "hugo@gmail.com", 
			'password' => 'hugo'
		),
		

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
