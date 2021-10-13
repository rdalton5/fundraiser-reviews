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
        $fundraisers = Fundraiser::factory(5)->create();
        foreach($fundraisers as $fundraiser) {
            $usersToReview = $users->random(rand(0, $users->count()));
            $reviews = $usersToReview->map(
                fn($user) => FundraiserReview::factory()->create([
                    'user_id' => $user->id,
                    'fundraiser_id' => $fundraiser->id
                ])
            );
            $fundraiser->reviews()->saveMany($reviews);
        }
    }
}
