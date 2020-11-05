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
        // $this->call(UserSeeder::class);

        foreach (\App\Organizer::all() as $i => $item) {
            $item->update([
                'password_hash' => bcrypt('demopass' . ($i + 1)),
            ]);
        }
    }
}
