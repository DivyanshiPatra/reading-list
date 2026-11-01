# Reading List App

A simple book management application built using Laravel.
Users can add books, edit book details, delete books, and filter their reading list by status.

## Features

- View all books
- Add new books
- Edit book details
- Delete books with confirmation
- Filter books by reading status:
  - To Read
  - Reading
  - Finished

## Technologies Used

- PHP
- Laravel
- SQLite
- HTML

## Setup Instructions

1. Clone the repository:

   git clone https://github.com/DivyanshiPatra/reading-list.git

2. Open the project folder:

   cd reading-list

3. Install dependencies:

   composer install

4. Create the environment file:

   copy .env.example .env

5. Generate the application key:

   php artisan key:generate

6. Run database migrations:

   php artisan migrate

7. Start the application:

   php artisan serve

8. Open http://127.0.0.1:8000 in your browser.

## AI Usage

AI tools were used to understand Laravel concepts, assist with code development, and troubleshoot errors. The application was reviewed and tested during development.