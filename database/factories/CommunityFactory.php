<?php

namespace Database\Factories;

use App\Models\Community;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Community::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type'=>'public',
            'cover'=>config('app.url').'/images/community/community.jpg',
            'picture'=>config('app.url').'/images/community/picture.jpg',
            'description'=>$this->faker->text(100)

        ];
    }
}
