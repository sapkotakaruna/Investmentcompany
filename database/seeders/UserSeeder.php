<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //        Schema::disableForeignKeyConstraints();
        //        DB::table('users')->truncate();
        //        Schema::enableForeignKeyConstraints();


        $superDev = User::create([
<<<<<<< HEAD
            'name'      => 'Admin Dev',
=======
        'name'      => 'Admin Dev',
>>>>>>> 860413d814efe3690716e72edc4ee89a82400cce
            'email'     => 'samudayik@admin.com',
            'password'  => bcrypt('samudayik@#3453'),
        ]);
        $superDev->assignRole('super-dev');
<<<<<<< HEAD


        $superAdmin = User::create([
            'name'      => 'Admin Super',
            'email'     => 'admin@super.com',
            'password'  => bcrypt('admin@123'),
        ]);
        $superAdmin->assignRole('super-admin');
=======
>>>>>>> 860413d814efe3690716e72edc4ee89a82400cce
    }
}
