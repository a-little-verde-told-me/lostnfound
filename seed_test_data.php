<?php
// Load the Laravel application
require __DIR__ . '/bootstrap/app.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Item;
use App\Models\Claim;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

// Clear existing data
Claim::truncate();
Item::truncate();
User::truncate();
Category::truncate();

// Create categories
$categories = [
    'Electronics',
    'Accessories',
    'Clothing',
    'Bags & Wallets',
];

foreach ($categories as $cat) {
    Category::create(['name' => $cat]);
}

// Create admin user
User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => bcrypt('admin123'),
    'role' => 'admin',
]);

// Create regular users
$user1 = User::create([
    'name' => 'Yasmien De Guman',
    'email' => 'yasmien@gmail.com',
    'password' => bcrypt('password'),
    'role' => 'user',
]);

$user2 = User::create([
    'name' => 'Jasmine Santos',
    'email' => 'jasmine@gmail.com',
    'password' => bcrypt('password'),
    'role' => 'user',
]);

$user3 = User::create([
    'name' => 'Ian Derilo',
    'email' => 'ian@gmail.com',
    'password' => bcrypt('password'),
    'role' => 'user',
]);

$user4 = User::create([
    'name' => 'Zeke De Guman',
    'email' => 'zeke@gmail.com',
    'password' => bcrypt('password'),
    'role' => 'user',
]);

// Create items
$item1 = Item::create([
    'name' => 'Wireless earphones',
    'description' => 'Blue wireless earphones with noise cancellation',
    'location' => 'Main Campus',
    'date_reported' => now()->subDays(10),
    'type' => 'found',
    'status' => 'active',
    'user_id' => 1,
    'category_id' => 1,
]);

$item2 = Item::create([
    'name' => 'School ID card',
    'description' => 'My school ID card with my photo',
    'location' => 'Library',
    'date_reported' => now()->subDays(8),
    'type' => 'found',
    'status' => 'active',
    'user_id' => 1,
    'category_id' => 4,
]);

$item3 = Item::create([
    'name' => 'Android phone',
    'description' => 'Samsung Galaxy S21 with black case',
    'location' => 'Student Lounge',
    'date_reported' => now()->subDays(3),
    'type' => 'found',
    'status' => 'active',
    'user_id' => 1,
    'category_id' => 1,
]);

$item4 = Item::create([
    'name' => 'Blue backpack',
    'description' => 'Blue backpack with multiple pockets',
    'location' => 'Gym',
    'date_reported' => now()->subDays(12),
    'type' => 'found',
    'status' => 'active',
    'user_id' => 1,
    'category_id' => 4,
]);

// Create claims
Claim::create([
    'user_id' => $user1->id,
    'item_id' => $item1->id,
    'proof_description' => 'I lost these earphones at the main campus last week',
    'phone_number' => '09123456789',
    'status' => 'pending',
    'date_claimed' => now()->subDays(9),
]);

Claim::create([
    'user_id' => $user2->id,
    'item_id' => $item2->id,
    'proof_description' => 'This is my school ID, I can describe all details on it',
    'phone_number' => '09234567890',
    'status' => 'pending',
    'date_claimed' => now()->subDays(7),
]);

Claim::create([
    'user_id' => $user3->id,
    'item_id' => $item3->id,
    'proof_description' => 'I can identify my phone by the serial number and my apps',
    'phone_number' => '09345678901',
    'status' => 'approved',
    'date_claimed' => now()->subDays(2),
]);

Claim::create([
    'user_id' => $user4->id,
    'item_id' => $item4->id,
    'proof_description' => 'My blue backpack, I have receipts for the items inside',
    'phone_number' => '09456789012',
    'status' => 'rejected',
    'date_claimed' => now()->subDays(11),
]);

echo "Test data created successfully!";
