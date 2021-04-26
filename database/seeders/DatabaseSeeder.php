<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(DummyDataSeeder::class);
        $this->call(SpecialDaysSeeder::class);

        $user = new User();
        $user->name = 'Laci';
        $user->email = 'laci@laci.hu';
        $user->password = bcrypt('secret');
        $user->save();

        \App\Models\Worker::factory(5)->create();
        \App\Models\Truck::factory(5)->create();
        \App\Models\Subcontractor::factory(5)->create();
        \App\Models\Company::factory(15)->create();
        \App\Models\Employee::factory(50)->create();
        \App\Models\Work::factory(50)->create();
        \App\Models\Note::factory(15)->create();
    }
}
