<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $itemNames = [
            'Airpods Pro', 'Samsung Galaxy Buds', 'Sony WH-1000XM4', 'Beats by Dre', 'JBL Flip 6',
            'iPhone 14', 'Samsung Galaxy S23', 'Google Pixel 7', 'OnePlus 11', 'iPad Air',
            'MacBook Pro', 'Dell XPS 13', 'HP Pavilion', 'ASUS VivoBook', 'Lenovo ThinkPad',
            'Leather Wallet', 'Coach Handbag', 'Gucci Shoulder Bag', 'Louis Vuitton Purse', 'Michael Kors Tote',
            'Car Keys', 'House Keys', 'USB Drive 32GB', 'External Hard Drive 1TB', 'Phone Charger',
            'Ray-Ban Sunglasses', 'Oakley Sport Glasses', 'Aviator Sunglasses', 'Cat Eye Glasses', 'Round Sunglasses',
            'Apple Watch Series 8', 'Samsung Galaxy Watch', 'Fitbit Charge 5', 'Garmin Watch', 'Fossil Smartwatch',
            'Canon EOS 5D', 'Nikon D850', 'Sony A7', 'GoPro Hero 11', 'DJI Drone',
            'Passport', 'Driver\'s License', 'Student ID', 'Library Card', 'Credit Card Holder',
            'Wedding Ring', 'Diamond Necklace', 'Gold Bracelet', 'Silver Earrings', 'Watch',
            'Textbook: Physics', 'Textbook: Chemistry', 'Textbook: Biology', 'Notebook', 'Laptop Bag',
            'Umbrella', 'Winter Jacket', 'College Hoodie', 'Sneakers', 'Dress Shoes',
            'Water Bottle', 'Thermos Flask', 'Coffee Mug', 'Travel Tumbler', 'Sports Bottle',
            'Bicycle Helmet', 'Baseball Cap', 'Beanie', 'Scarf', 'Gloves',
            'Tennis Racket', 'Badminton Set', 'Basketball', 'Soccer Ball', 'Golf Clubs',
            'Camera Lens', 'Memory Card 256GB', 'Tripod', 'Ring Light', 'Microphone',
            'Bluetooth Speaker', 'Wireless Charger', 'Phone Stand', 'Keyboard', 'Mouse',
            'Perfume Bottle', 'Cologne', 'Sunscreen', 'Lipstick', 'Skincare Set',
            'Gym Membership Card', 'Concert Ticket', 'Movie Ticket', 'Train Pass', 'Bus Card',
            'Paint Set', 'Sketchbook', 'Colored Pencils', 'Calligraphy Pen', 'Fountain Pen',
            'Hairbrush', 'Hair Dryer', 'Hair Straightener', 'Hair Curler', 'Hair Clips',
        ];

        $locations = [
            'IT Room 3', 'IT Room 5', 'TechMac Bldg', 'NatSci Bldg', 'Convention Hall',
            'Mac Loh', 'TechHub Bldg', 'Campus Canteen', 'Library Ground Floor', 'Library 2nd Floor',
            'Gym', 'Parking Lot', 'Main Hallway', 'Student Center', 'Cafeteria',
            'Swimming Pool', 'Basketball Court', 'Tennis Court', 'Auditorium', 'Conference Room A',
            'Conference Room B', 'Computer Lab', 'Biology Lab', 'Chemistry Lab', 'Physics Lab',
            'Art Studio', 'Music Room', 'Practice Room', 'Gym Locker Room', 'Bathroom',
        ];

        $types = ['lost', 'found'];

        $statuses = ['pending', 'claimed', 'returned'];

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => fake()->randomElement($itemNames),
            'description' => fake()->sentence(10),
            'image' => null,
            'type' => fake()->randomElement($types),
            'status' => fake()->randomElement($statuses),
            'location' => fake()->randomElement($locations),
            'date_reported' => fake()->dateTimeBetween('-90 days', 'now'),
        ];
    }
}
