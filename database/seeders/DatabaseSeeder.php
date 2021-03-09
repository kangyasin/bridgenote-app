<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserPosition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        User::factory(10)
            ->has(UserPosition::factory()->count(1), 'position')
            ->create();
    }

    protected function createAdmin() {
        if(User::where('email','admin@bridgenote.com')->count() <1)
        {
            User::create(
                [
                    'name' => 'Admin',
                    'email' => 'admin@bridgenote.com',
                    'email_verified_at' => now(),
                    'password' => bcrypt('admin123'), // password
                    'remember_token' => Str::random(10),
                ]);
        }

    }
}
