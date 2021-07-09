<?php

namespace Database\Factories;

use App\Models\User_community;
use Illuminate\Database\Eloquent\Factories\Factory;

class User_communityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User_community::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'community_id'=>'overridden',
            'role'=>'creator',
            'user_id' => 'overridden'
        ];
    }
}
