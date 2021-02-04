<?php

namespace Database\Factories;

use App\Models\Pos;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PosTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'pos_id'=>Pos::all()->random()->id,
                'tag_id'=>Tag::all()->random()->id,
            ];
    }
}
