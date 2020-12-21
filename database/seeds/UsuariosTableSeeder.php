<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('assigned_roles')->truncate();
        DB::table('items_roles')->truncate();
        User::truncate();
        Role::truncate();
        
        
        $user = User::create([
            'name'=> 'Edwin',
            'lastname'=> 'Zapata',
            'email'=> 'edwinrzc@gmail.com',
            'password'=> 'admin00',
            'state'=> 1,
        ]);
        
        
         $role = Role::create([
             'name'=>'ADMIN-USER',
             'description'=>'Administrador del sistema'
         ]);
        
        
         $user->roles()->save($role);
        
    }
}
