<?php

use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Visit::class, 30)->create();

        factory(App\Companionship::class, 15)->create();

    }
}
