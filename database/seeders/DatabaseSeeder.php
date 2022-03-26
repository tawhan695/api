<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keytime;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     UserSeeder::class,
        //     PostSeeder::class,
        //     CommentSeeder::class,
        // ]);
        // factory(App\Models\Keytime::class, 3)->create();
        // for ($i = 0; $i < 5 ;$i++){

        //     Keytime :: create([
        //         'keytime'=> Str::random(60),
        //         'days'=>30,
        //     ]);
        // }
    $role = Role::create(['name' => 'admin']);
       $admin =  User::create([
            'name' =>'Admin',
            'email' => 'tanongsak695@gmail.com',
            'password' => Hash::make('@t1350800287695t'),
        ]);
        $admin->assignRole('admin');
    }
}
