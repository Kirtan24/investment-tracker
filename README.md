# 💸 Investment Tracker

**Investment Tracker** is a Laravel-based web application designed to help users track and manage different types of investments such as Fixed Deposits, Properties, and Stocks. It offers a clean and simple UI built with Bootstrap and jQuery, including authentication functionality (login and registration) powered by [laravel/ui](https://github.com/laravel/ui). Each user has their own dashboard featuring investment summaries and visualized insights using Chart.js.

## 🚀 Features

- User Authentication (Login / Register)
- Dashboard with investment summary
- Charts and visual insights using Chart.js
- Investment types supported: Fixed Deposit, Property, Stock
- Add, View, Edit, and Delete investments
- Responsive UI using Bootstrap 5
- jQuery-based dynamic interactions (non-AJAX)
- Laravel Factories and Seeders for demo data generation

## 🛠️ Tech Stack

- Laravel Framework
- [laravel/ui](https://github.com/laravel/ui) for auth scaffolding
- Bootstrap 5 for UI styling
- jQuery for client-side interactions
- Chart.js for data visualization
- MySQL for database
- PHP 8+
- Laravel Factories & Seeders for test data generation

## 📦 Getting Started

Follow the steps below to set up the project on your local machine.

### 1. Clone the repository

```bash
git clone https://github.com/your-username/investment-tracker.git
cd investment-tracker
```

### 2. Install PHP dependencies

Make sure you have Composer installed.

```bash
composer install
```

### 3. Install Node dependencies (for Bootstrap and Chart.js)

```bash
npm install && npm run dev
```

### 4. Configure your .env file

Copy the example file:

```bash
cp .env.example .env
```

Then generate the application key:

```bash
php artisan key:generate
```

Now open the .env file and set your database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=investmenttracker
DB_USERNAME=your_mysql_username
DB_PASSWORD=your_mysql_password
```

### 5. Set up the database

**Option 1**: Import the provided SQL file
You can import the investmenttracker.sql file directly into your MySQL server:

```bash
mysql -u your_mysql_username -p investmenttracker < investmenttracker.sql
```

**Option 2**: Run migrations (if no SQL file)
If you prefer to migrate manually:

```bash
php artisan migrate
```

And seed the database with demo data:

```bash
php artisan db:seed
```

### 6. Database Seeding Details

The application comes with two seeders:

1. **UserSeeder**: Creates demo user accounts for testing
2. **DatabaseSeeder**: Populates the database with sample investment data

The seeders leverage Laravel's Factory system to generate realistic test data for:
- Fixed Deposits with varying interest rates and maturity dates
- Property investments with location and valuation details
- Stock investments with price and quantity information

Run the seeders to quickly populate your database with test data:

```bash
# Run all seeders
php artisan db:seed

# Run specific seeder
php artisan db:seed --class=UserSeeder
```

### 7. Serve the app

```bash
php artisan serve
```

Visit: http://localhost:8000

## 📊 Dashboard Overview

After login, users are redirected to their personalized dashboard where they can:

- View their total investments
- See charts summarizing different investment types (powered by Chart.js)
- Perform full CRUD (Create, Read, Update, Delete) operations on investments

## 👨‍💻 Implementation Details

This project demonstrates proficiency in several Laravel features:

- **Model-View-Controller (MVC)** architecture
- **Laravel Factories** for generating test data
- **Laravel Seeders** for database population
- **Eloquent ORM** for database interactions
- **Form Request Validation**
- **Blade Templating**
- **Authentication** using laravel/ui
- **Resource Controllers**
- **Frontend integration** with Bootstrap and jQuery
