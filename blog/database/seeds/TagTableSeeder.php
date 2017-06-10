<?php

use Illuminate\Database\Seeder;
use App\Tag as tags;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //generar datos de pruebas con la semilla
        // for ($i=0; $i < 20 ; $i++) { 
        // $tag = new tags();
        // $tag->name = "AAAAAAAAAAAA {$i} ";
        // $tag->frequency = "Probando laravel con semillas {$i}";
        // $tag->save();    
        // }
        
        // borrar datos de la semilla
        // $tag = new tags();
        // $tag->where('id','>',10)->forceDelete();
        
        
    }
}
