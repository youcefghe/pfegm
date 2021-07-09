<?php

namespace Database\Seeders;

use App\Models\Community;
use Database\Factories\CommunityFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         Community::factory()->count(20)->create();

    }
}
