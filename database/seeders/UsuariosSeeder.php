<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('TablecatStatus')->insert([
          'strStatus' => 'Active',
          'bolVigente' => TRUE
            //
            ]);
         DB::table('TablecatStatus')->insert([
                'strStatus' => 'Pendiente',
                'bolVigente' => FALSE
                  //
                  ]);
         DB::table('TablecatStatus')->insert([
                    'strStatus' => 'Suspendido',
                    'bolVigente' => FALSE
                      //
                      ]);
        DB::table('TablecatStatus')->insert([
                        'strStatus' => 'Bloqueado',
                        'bolVigente' => FALSE
                          //
                          ]);

        DB::table('TableUsuarios')->insert([
          'idStatus' => '1',
        'strNombre' => 'Osman',
        'strApellidoPaterno' => 'Barrera',
        'strApellidoMaterno' => 'Juarez',
        'strLogin' => 'Osmanbj@hotmail.com',
        'strPassword' => 'password'
        //
        ]);

     
    }
}
