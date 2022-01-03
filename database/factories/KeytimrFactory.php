<?php

namespace Database\Factories;

use App\Models\Keytime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class KeytimrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Keytime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'keytime'=> Str::random(60),
            'days'=>30,
        ];
    }
}
