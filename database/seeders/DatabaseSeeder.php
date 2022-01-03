<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keytime;
use Illuminate\Support\Str;
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
        for ($i = 0; $i < 5 ;$i++){

            Keytime :: create([
                'keytime'=> Str::random(60),
                'days'=>30,
            ]);
        }
    }
}
