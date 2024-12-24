# Budget Manager Application

A simple and efficient budget management application built with Laravel 11. This application helps you track expenses and manage budget categories.

## Features

- Expense tracking with categories
- Category management
- Simple and clean interface
- No authentication required

## Installation Steps

1. **Clone the repository**

   ```bash
   git clone <repository-url>
   cd AppBudget
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Run migrations and seeders**

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

4. **Start the development server**
   ```bash
   php artisan serve
   ```

The application will be available at `http://localhost:8000`

## Database Structure

The application uses two main tables:

- `categories`: Stores budget categories
- `expenses`: Stores individual expenses linked to categories

## Usage

1. **Categories Management**

   - View all categories at `/categories`
   - Add new categories
   - Delete categories (only if they have no associated expenses)

2. **Expenses Management**
   - View all expenses at `/expenses` or the homepage
   - Add new expenses with category and amount
   - Delete existing expenses
