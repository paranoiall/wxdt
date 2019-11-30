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
        $this->call(user_seeder::class);
        $this->call(userdata_seeder::class);
        $this->call(choose_seeder::class);
        $this->call(mutichoose_seeder::class);
        $this->call(fillBlank_seeder::class);
        $this->call(judge_seeder::class);
    }
}
