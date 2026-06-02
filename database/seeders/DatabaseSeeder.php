<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create categories
        $categories = [
            'Electronics',
            'Accessories',
            'Clothing',
            'Bags',
            'Wallets',
            'Jewelry',
            'Books',
            'Documents',
            'Personal Items',
            'Others'
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }

        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'phone_number' => '+1-800-ADMIN-01',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'User',
                'phone_number' => '0943 745 6745',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );

        User::firstOrCreate(
            ['email' => 'verde@example.com'],
            [
                'name' => 'Verde',
                'phone_number' => '0912 345 6789',
                'password' => Hash::make('verde123'),
                'role' => 'user',
            ]
        );
        
        // Create test items for the existing users
        // $users = User::all();
        // foreach ($users as $user) {
        //     if ($user->role !== 'admin') {
        //         Item::factory(3)->create(['user_id' => $user->id, 'status' => 'active']);
        //     }
        // }
    }
}
