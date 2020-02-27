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
        $this->call(AdminTableSeeder::class);
        factory(App\Model\User\User::class, 70)->create();
        factory(App\Model\Qualification::class, 10)->create();
        factory(App\Model\Lecture::class, 50)->create();
        factory(App\Model\Course::class, 50)->create();
        factory(App\Model\UserDetail::class, 70)->create();
    }
}
