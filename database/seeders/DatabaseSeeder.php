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
            'Bags & Wallets',
            'Jewelry',
            'Sports & Recreation',
            'Books & Documents',
            'Personal Items',
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
                'phone_number' => '+1-800-USER-01',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );
        // // Create 20 regular users
        // User::factory(20)->create();

        // // Create 100 items using the factory
        // Item::factory(100)->create();
    }
}
