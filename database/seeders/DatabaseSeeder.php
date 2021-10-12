<?php

namespace Database\Seeders;

use App\Models\Fundraiser;
use App\Models\FundraiserReview;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();
        $fundraisers = Fundraiser::factory(3)->create();
        $users->chunk(4)->each(function($users, $i) use ($fundraisers){
            $reviews = $users->map(fn($user) => FundraiserReview::factory()->create(['user_id' => $user->id]));
            $fundraisers[$i]->reviews()->saveMany($reviews);
        });
    }
}
