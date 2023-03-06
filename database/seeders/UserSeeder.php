<?php

namespace Database\Seeders;

use App\Classes\Enums\UserTypesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Admin Create*/
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'user_type' => UserTypesEnum::Admin,
        ]);

        /*Seller Create*/
        User::create([
            'name' => 'Seller',
            'email' => 'seller@seller.com',
            'password' => bcrypt('12345678'),
            'user_type' => UserTypesEnum::Seller,
        ]);

        /*Buyer Create*/
        User::create([
            'name' => 'Buyer',
            'email' => 'buyer@buyer.com',
            'password' => bcrypt('12345678'),
            'user_type' => UserTypesEnum::User,
        ]);
    }
}
