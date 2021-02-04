<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Pos;
use Illuminate\Database\Eloquent\Factories\Factory;

class PosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titulo=$this->faker->name;

        return [
            'title'=>$titulo,
            'url'=>Str::slug($titulo),
            'excerpt'=>$this->faker->paragraph,
            'body'=>$this->faker->paragraph,
            'published_at'=>now(),
            'category_id'=>Category::all()->random()->id,


        ];
    }
}
