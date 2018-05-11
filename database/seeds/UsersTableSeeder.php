<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array (
			0 => array (
                'id' => 1,
                'email' => 'sample@gmail.com',
                'password' => bcrypt('sample'),
                'remember_token' => 'Aq39BKFN4uKckjvl6M2JVfGBD14r9seMq0ZQI4wui4wVgQmUaL2tJvYhdFG6',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            )
        ));
    }
}
