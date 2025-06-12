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
        'name'      => 'Admin Dev',
            'email'     => 'samudayik@admin.com',
            'password'  => bcrypt('samudayik@#3453'),
        ]);
        $superDev->assignRole('super-dev');
    }
}
