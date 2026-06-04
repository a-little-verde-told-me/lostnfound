-- Disable foreign key checks
SET FOREIGN_KEY_CHECKS=0;

-- First, clear existing data
TRUNCATE TABLE claim;
TRUNCATE TABLE item;
TRUNCATE TABLE user;
TRUNCATE TABLE category;

-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS=1;

-- Create categories
INSERT INTO category (name, created_at, updated_at) VALUES
('Electronics', NOW(), NOW()),
('Accessories', NOW(), NOW()),
('Clothing', NOW(), NOW()),
('Bags & Wallets', NOW(), NOW());

-- Create admin user
INSERT INTO user (name, email, password, phone_number, role, created_at, updated_at) VALUES
('Admin User', 'admin@example.com', '$2y$12$heP6KZM4raPx5l5uJbcmWOWiZFe1zZx5K5K8G5Q5Q5Q5Q5Q5Q5Q5Q', '09000000000', 'admin', NOW(), NOW());

-- Create regular users
INSERT INTO user (name, email, password, phone_number, role, created_at, updated_at) VALUES
('Yasmien De Guman', 'yasmien@gmail.com', '$2y$10$password', '09123456789', 'user', NOW(), NOW()),
('Jasmine Santos', 'jasmine@gmail.com', '$2y$10$password', '09234567890', 'user', NOW(), NOW()),
('Ian Derilo', 'ian@gmail.com', '$2y$10$password', '09345678901', 'user', NOW(), NOW()),
('Zeke De Guman', 'zeke@gmail.com', '$2y$10$password', '09456789012', 'user', NOW(), NOW());

-- Create items
INSERT INTO item (name, description, location, date_reported, type, status, user_id, category_id, created_at, updated_at) VALUES
('Wireless earphones', 'Blue wireless earphones with noise cancellation', 'Main Campus', DATE_SUB(NOW(), INTERVAL 10 DAY), 'found', 'active', 1, 1, NOW(), NOW()),
('School ID card', 'My school ID card with my photo', 'Library', DATE_SUB(NOW(), INTERVAL 8 DAY), 'found', 'active', 1, 4, NOW(), NOW()),
('Android phone', 'Samsung Galaxy S21 with black case', 'Student Lounge', DATE_SUB(NOW(), INTERVAL 3 DAY), 'found', 'active', 1, 1, NOW(), NOW()),
('Blue backpack', 'Blue backpack with multiple pockets', 'Gym', DATE_SUB(NOW(), INTERVAL 12 DAY), 'found', 'active', 1, 4, NOW(), NOW());

-- Create claims
INSERT INTO claim (user_id, item_id, proof_description, contact_email, contact_number, phone_number, status, date_claimed, created_at, updated_at) VALUES
(2, 1, 'I lost these earphones at the main campus last week', 'yasmien@gmail.com', '09123456789', '09123456789', 'pending', DATE_SUB(NOW(), INTERVAL 9 DAY), NOW(), NOW()),
(3, 2, 'This is my school ID, I can describe all details on it', 'jasmine@gmail.com', '09234567890', '09234567890', 'pending', DATE_SUB(NOW(), INTERVAL 7 DAY), NOW(), NOW()),
(4, 3, 'I can identify my phone by the serial number and my apps', 'ian@gmail.com', '09345678901', '09345678901', 'approved', DATE_SUB(NOW(), INTERVAL 2 DAY), NOW(), NOW()),
(5, 4, 'My blue backpack, I have receipts for the items inside', 'zeke@gmail.com', '09456789012', '09456789012', 'rejected', DATE_SUB(NOW(), INTERVAL 11 DAY), NOW(), NOW());
