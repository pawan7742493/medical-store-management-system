# Medical Store Management System

A web-based Medical Store Management System built with Laravel, PHP, MySQL, Blade, HTML, CSS and JavaScript.

The system is designed to manage medicines, products, customers, inventory, orders and invoices through a structured web application.

## Features

### Admin Panel

- Admin dashboard
- Medicine management
- Category management
- Product management
- Customer management
- Order management
- Invoice management
- Search functionality
- Account and password management
- Role-based access control

### Customer

- Customer registration and login
- Browse medicines and products
- View product details
- Add products to cart
- Checkout
- Place orders
- View order history
- View invoices
- Manage profile

### Medicine & Inventory Management

- Add, edit, view and delete medicines
- Category-based medicine organization
- Medicine batch and expiry information
- Purchase, wholesale and retail pricing
- Stock management
- Product management

### Order & Invoice Management

- Customer order processing
- Order item management
- Order status management
- Invoice generation and viewing
- Customer order history

## Technology Stack

- **Backend:** Laravel, PHP
- **Database:** MySQL
- **Frontend:** Blade, HTML, CSS, JavaScript
- **Styling:** Bootstrap, Tailwind CSS
- **ORM:** Laravel Eloquent
- **Database Management:** Laravel Migrations
- **Build Tool:** Vite
- **Version Control:** Git & GitHub

## Laravel Concepts Used

- MVC Architecture
- Routing
- Controllers
- Models
- Blade Templates
- Eloquent ORM
- Database Migrations
- Model Relationships
- Middleware
- Form Validation
- Authentication
- Role-Based Access Control
- Request Classes
- Session Management

## Project Structure

```text
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│   └── Requests/
├── Models/
└── View/

database/
└── migrations/

resources/
└── views/
    ├── admin/
    ├── customer/
    ├── frontend/
    └── auth/

routes/
└── web.php

public/
└── assets/

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
