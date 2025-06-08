<?php

use App\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keymasterRole = Role::where('name', 'keymaster')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $staffRole = Role::where('name', 'staff')->first();
        $customerRole = Role::where('name', 'customer')->first();
        $developerRole = Role::where('name', 'developer')->first();
        $supplierRole = Role::where('name', 'supplier')->first();

        $keymaster = User::create([
            'userName' => 'keymasterUser',
            'Fname' => 'keymaster User',
            'Lname' => 'Ramal',
            'image' => 'sdfsd.jpeg',
            'email' => 'keymaster@gmail.com',
            'bday' => '2020.05.29',
            'password' => Hash::make('password'),

        ]);
        $admin = User::create([
            'userName' => 'adminUser',
            'Fname' => 'Admin User',
            'Lname' => 'Ramal',
            'image' => 'sdfsd.jpeg',
            'email' => 'adminUser@gmail.com',
            'bday' => '2020.05.29',
            'password' => Hash::make('password'),

        ]);

        $staff = User::create([
            'userName' => 'staffUser',
            'Fname' => 'staff User',
            'Lname' => 'Ramal',
            'image' => 'sdfsd.jpeg',
            'email' => 'staffUser@gmail.com',
            'bday' => '2020.05.29',
            'password' => Hash::make('password'),

        ]);

        $customer = User::create([
            'userName' => 'customerUser',
            'Fname' => 'customer user',
            'Lname' => 'Ramal user',
            'image' => 'sdfsd.jpeg',
            'email' => 'customerUser@gmail.com',
            'bday' => '2020.05.29',
            'password' => Hash::make('password'),
        ]);

        $developer = User::create([
            'userName' => 'developerUser',
            'Fname' => 'developer user',
            'Lname' => 'Ramal',
            'image' => 'sdfsd.jpeg',
            'email' => 'developerUser@gmail.com',
            'bday' => '2020.05.29',
            'password' => Hash::make('password'),
        ]);
        $supplier = User::create([
            'userName' => 'supplierUser',
            'Fname' => 'supplier user',
            'Lname' => 'Ramal',
            'image' => 'sdfsd.jpeg',
            'email' => 'supplierUser@gmail.com',
            'bday' => '2020.05.29',
            'password' => Hash::make('password'),
        ]);

        $keymaster->roles()->attach($keymasterRole);
        $admin->roles()->attach($adminRole);
        $staff->roles()->attach($staffRole);
        $customer->roles()->attach($customerRole);
        $developer->roles()->attach($developerRole);
        $supplier->roles()->attach($supplierRole);
    }
}
