<?php

namespace Database\Seeders;

use App\Models\User_community;
use Illuminate\Database\Seeder;

class User_communitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<21;$i++){
        User_community::factory()->create(['user_id'=>rand(16,40),'community_id'=>rand(1,20)]);
        }
    }
}
