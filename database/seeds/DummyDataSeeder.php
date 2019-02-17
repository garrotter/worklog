<?php

use Illuminate\Database\Seeder;
use App\User;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Laci';
        $user->email = 'laci@laci.hu';
        $user->password = bcrypt('secret');
        $user->save();

        $worker = factory(App\Worker::class, 5)->create();
        $truck = factory(App\Truck::class, 5)->create();
        $subcontractor = factory(App\Subcontractor::class, 5)->create();
        $company = factory(App\Company::class, 15)->create();
        $employee = factory(App\Employee::class, 50)->create();
        $work = factory(App\Work::class, 50)->create();
    }
}
