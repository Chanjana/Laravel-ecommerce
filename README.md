# TRIF

TRIF is an innovative online marketplace designed to connect buyers and sellers for the resale of low-cost used items. Inspired by the concept of thrifting, TRIF aims to promote affordability and sustainability in consumer choices while fostering a vibrant community of thrifty enthusiasts.

## Table of Contents

1. [Introduction](#introduction)
2. [System Overview](#system-overview)
3. [Key Features](#key-features)
4. [Target Audience](#target-audience)
5. [Technology Stack](#technology-stack)
6. [Installation](#installation)
7. [Usage](#usage)
8. [Contributing](#contributing)
9. [License](#license)

## Introduction

TRIF is an online marketplace that facilitates the buying and selling of used items at budget-friendly prices. The platform emphasizes sustainability and affordability, catering to individuals seeking unique and cost-effective goods while promoting a greener approach to consumption.

## System Overview

TRIF operates as a dynamic platform where sellers can list their pre-loved items for sale, and buyers can browse through a wide range of products to find hidden treasures. The system ensures secure transactions and provides features such as user authentication, product listings, shopping cart functionality, order history tracking, and seller profiles.

## Key Features

- **User Registration and Authentication**: Secure user registration and login functionality.
- **Product Listing**: Sellers can list items with detailed descriptions and images.
- **Shopping Cart**: Buyers can add items to their cart for convenient purchasing.
- **Checkout**: Secure checkout process for completing transactions.
- **Order History**: Users can view their past orders and transaction details.
- **Seller Profiles**: Personalized profiles for sellers to showcase their listed items.

## Target Audience

TRIF caters to individuals seeking budget-friendly and sustainable purchasing options for second-hand items. This includes sellers looking to declutter and buyers searching for unique, affordable goods.

## Technology Stack

TRIF is built using the Laravel framework, a powerful PHP framework known for its expressive syntax and robust features. Laravel follows the Model-View-Controller (MVC) architecture, which separates the application's logic into three distinct layers:

- **Model**: Represents the data and database interactions of the application. Laravel's Eloquent ORM simplifies database operations by providing an intuitive ActiveRecord implementation.
- **View**: Handles the presentation layer of the application, responsible for rendering HTML templates. Laravel's Blade templating engine offers a clean and efficient syntax for designing views.
- **Controller**: Acts as an intermediary between the Model and View layers, processing incoming requests and generating appropriate responses. Controllers contain the application's business logic and orchestrate interactions between models and views.

### Data Migrations

Laravel's migration feature allows developers to manage database schemas and version control database changes. With migrations, database schema changes can be easily tracked and applied across different environments.

### Controllers and Seeders

Controllers in Laravel handle incoming HTTP requests and execute the corresponding actions. They serve as the entry points for processing user input and interacting with models and views. Seeders, on the other hand, are used to populate the database with dummy data for testing and development purposes.

### Additional Components

TRIF utilizes Jetstream and Livewire for enhanced functionality and interactivity. Jetstream provides authentication scaffolding, including login, registration, and password reset features, while Livewire enables seamless, dynamic interactions between the frontend and backend without the need for JavaScript.


## Installation

To set up TRIF on your local machine, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone <repository_url>

2. **Navigate to the project directory**:
   ```bash
   cd <project_directory>
3. **Install Composer dependencies**:
4. ```bash
   composer install
5. **Install NPM dependencies**:
   ```bash
    npm install
7. **Create a copy of the `.env.example` file and rename it to `.env`**:
    ```bash
   cp .env.example .env
9. **Generate an application key**:
    ```bash
   php artisan key
11. **Configure your database connection in the `.env` file**:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<your_database_name>
    DB_USERNAME=<your_database_username>
    DB_PASSWORD=<your_database_password>

13. **Migrate the database**:
    ```bash
    php artisan migrate

15. **Run the seeders**:
    ```bash
   php artisan db

With these steps, you'll have TRIF set up and ready to use on your local machine. Adjust the placeholders in angle brackets (<>) with your actual repository URL, project directory, database details, and other necessary information.

## Usage

Once TRIF is set up, users can register as buyers or sellers, browse through listings, add items to their cart, and complete transactions securely. Sellers can manage their listings and track orders, while buyers can view their order history and manage their account settings.

## Contributing

Contributions to TRIF are welcome! If you'd like to contribute, please fork the repository, make your changes, and submit a pull request. Be sure to follow the project's coding standards and guidelines.

## License

This project is licensed under the [MIT License](LICENSE).
