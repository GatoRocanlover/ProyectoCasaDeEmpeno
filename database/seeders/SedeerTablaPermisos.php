<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SedeerTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
             //Operaciones sobre tabla roles
             'ver-usuario',
             'crear-usuario',
             'editar-usuario',
             'borrar-usuario',
 

    
           
           
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}

//ejecutar php artisan db:seed  --class=SedeerTablaPermisos