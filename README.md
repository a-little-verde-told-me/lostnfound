# FindIt - Lost and Found Management System

---

## Project Description

Findit is a community-driven platform dedicated to helping people find lost items and report discovered belongings. Our mission is to reunite lost possessions with their rightful owners through efficient categorization and community collaboration. Whether you've lost something valuable or found an item that needs to be returned to its owner, Findit makes the process simple and straightforward. Our platform connects people in your community, making it easier to solve the problem of lost and found items.

---

## Developers

| Name                      |
|---------------------------|
| De Guzman, Yasmien G.     |
| Derilo, Ian Gabriel S.    |
| Santos, Jasmine L.        |

---

## How the System Works

There are two types of users in the system -- a regular user and an admin.

### For Regular Users:

1. You create an account and log in
2. If you lost something, click Report Lost Item and fill out the form -- item name, category, description, location, date, and a photo
3. If you found something, click Report Found Item and do the same
4. You can browse all active listings and use the search bar to filter by category or keyword
5. If you find something that looks like yours, you hit File a Claim and describe why it belongs to you
6. You can track your reports and claims from your dashboard

### For Admin:

1. Admin logs in and lands on the admin dashboard
2. They can see all submitted reports and pending claims
3. They review each claim and either approve or reject it
4. If approved, the item status changes to Claimed
5. Admin can also manage users, categories, and export reports via PDF, XLSX, CSV or JSON file.

## Installation & Setup Instructions

Follow these steps to run the project on your local machine.

### Step 1 - Clone the repository

```bash
git clone https://github.com/a-little-verde-told-me/lostnfound.git
cd findit-lost-and-found

### Step 2 - Install dependencies

composer install
Step 3 - Set up your environment file
cp .env.example .env
php artisan key:generate
Then open .env and update your database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=your_port
DB_DATABASE=lostnfound
DB_USERNAME=root
DB_PASSWORD=your_password

### Step 4 - Create the database

Open your MySQL client (phpMyAdmin or terminal) and create a database named:
lostnfound 

### Step 5 - Run migrations and seeders

php artisan migrate
php artisan db:seed
This will create all the tables and add sample data including a default admin account.
Default admin credentials:
Email:    admin@example.com
Password: admin123

### Step 6 - Run the development server

php artisan serve
Click Ctrl + click the link to directly go to your browser or Open your browser and go to:
http://127.0.0.1:8000

## Hosting
The live version of this project is deployed here:
https://findit-app.up.railway.app