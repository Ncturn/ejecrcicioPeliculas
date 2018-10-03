<?php

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
        // $this->call(UsersTableSeeder::class);
        // factory(App\Movie::class)->times(20)->create();
        $users = factory(App\User::class,3)->create();
        
        $users->each(function(App\User $user) use ($users)
        {
            $movies = factory(App\Movie::class,5)->create();
            $users_id = $user->id;
            $movies->each(function(App\Movie $movie) use ($movies,$users_id)
            {
                factory(App\Comment::class)->times(2)->create([
                    'user_id' => $users_id,
                    'movie_id' => $movie->id,
                ]);
            });
        });
    }
}
