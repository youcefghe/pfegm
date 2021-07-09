<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->text(17),
            'content'=>"<p>".$this->faker->text(200)."</p>",
            'user_id'=>rand(1,40),
            'community_id'=>rand(1,20),
            'solved'=>false
        ];
    }
}
