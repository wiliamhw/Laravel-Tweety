<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tweet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            TweetSeeder::class // Every user makes ten tweets
        ]);

        $users = User::all();
        $tweets = Tweet::all();

        // Populate follows table
        // Every user follow one-to-three random user
        $users->each(
            function ($user) use ($users) {
                $users->random(rand(1, 3))->each(
                    function ($rand_user) use ($user) {
                        $user->follow($rand_user);
                    }
                );
            }
        );

        // Populate likes table
        // 10 tweet is liked/disliked by a total of one-to-three
        $tweets->take(10)->each(
            function ($tweet) use ($users) {
                $users->random(rand(1, 3))->each(
                    function ($rand_user) use ($tweet) {
                        $tweet->like(
                            $rand_user,
                            $liked = rand(0, 1)
                        );
                    }
                );
            }
        );
    }
}
