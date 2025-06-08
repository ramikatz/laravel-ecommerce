<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'address_line_1' => '33/3',
            'address_line_2' => 'wattalpola',
            'city' => 'panadura',
            'district' => 'kaluthara',
            'province' => 'west',
            'postal_code' => '12500',
            'mobile' => '0755538411',
            'user_id' => 1,
        ]);
        DB::table('addresses')->insert([
            'address_line_1' => '33/3',
            'address_line_2' => 'wattalpola',
            'city' => 'panadura',
            'district' => 'kaluthara',
            'province' => 'west',
            'postal_code' => '12500',
            'mobile' => '0755538411',
            'user_id' => 2,
        ]);
        DB::table('addresses')->insert([
            'address_line_1' => '33/3',
            'address_line_2' => 'wattalpola',
            'city' => 'panadura',
            'district' => 'kaluthara',
            'province' => 'west',
            'postal_code' => '12500',
            'mobile' => '0755538411',
            'user_id' => 3,
        ]);
        DB::table('addresses')->insert([
            'address_line_1' => '33/3',
            'address_line_2' => 'wattalpola',
            'city' => 'panadura',
            'district' => 'kaluthara',
            'province' => 'west',
            'postal_code' => '12500',
            'mobile' => '0755538411',
            'user_id' => 4,
        ]);
        DB::table('addresses')->insert([
            'address_line_1' => '33/3',
            'address_line_2' => 'wattalpola',
            'city' => 'panadura',
            'district' => 'kaluthara',
            'province' => 'west',
            'postal_code' => '12500',
            'mobile' => '0755538411',
            'user_id' => 5,
        ]);
        DB::table('addresses')->insert([
            'address_line_1' => '33/3',
            'address_line_2' => 'wattalpola',
            'city' => 'panadura',
            'district' => 'kaluthara',
            'province' => 'west',
            'postal_code' => '12500',
            'mobile' => '0755538411',
            'user_id' => 6,
        ]);

    }
}
