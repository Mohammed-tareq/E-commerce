# 🛒 E-Commerce Platform

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-3.7-FB70A9?style=for-the-badge&logo=livewire&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind-4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

**A modern, full-featured e-commerce platform built with Laravel 12 and cutting-edge technologies.**

[Features](#-features) • [Tech Stack](#-tech-stack) • [Installation](#-installation) • [Documentation](#-project-structure)

</div>

---

## ⚠️ Project Status

> **🚧 WORK IN PROGRESS - UNDER ACTIVE DEVELOPMENT**
>
> This project is currently in active development. Many features and system components are still being implemented and refined. The codebase is not production-ready and is subject to significant changes. Use at your own discretion for development and testing purposes only.
>
> **Current Development Phase:** Core modules implementation and testing

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [System Requirements](#-system-requirements)
- [Installation](#-installation)
- [Project Structure](#-project-structure)
- [Configuration](#-configuration)
- [Development](#-development)
- [Database Schema](#-database-schema)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🎯 Overview

This E-Commerce Platform is a comprehensive, enterprise-grade solution designed for building modern online stores. Built on Laravel 12 with a clean architecture pattern (Repository-Service), it provides a robust foundation for scalable e-commerce applications.

### Key Highlights

- **Multi-Language Support** - Fully internationalized with English and Arabic support
- **Role-Based Access Control** - Granular permissions system for admins and users
- **Modern UI/UX** - Responsive design with Livewire for reactive components
- **Advanced Product Management** - Support for product variants, attributes, and dynamic pricing
- **Secure Authentication** - OTP-based authentication with email verification
- **Performance Optimized** - Redis caching, database indexing, and eager loading

---

## ✨ Features

### 🛡️ Admin Dashboard

- **Authentication & Security**
  - OTP-based login and password reset
  - Multi-factor authentication support
  - Secure password recovery with email verification
  - Role and permission management system

- **Product Management**
  - ✅ Wizard-based product creation workflow
  - ✅ Product variants with dynamic attributes
  - ✅ Multiple image upload with preview and carousel display
  - ✅ Image management (upload, delete, fullscreen preview)
  - ✅ Bulk operations and batch processing
  - ✅ Product status management (active/inactive)
  - ✅ Yajra DataTables integration for advanced listing

- **Catalog Management**
  - ✅ Categories and subcategories with hierarchical structure
  - ✅ Brand management with logo support
  - ✅ Product attributes and attribute values
  - ✅ Tag system for better organization
  - ✅ Dynamic attribute assignment to products

- **Order & Sales Management**
  - Order processing and tracking
  - Order items management
  - Transaction history and reporting
  - Wishlist functionality

- **Marketing & Promotions**
  - ✅ Coupon/discount code management
  - ✅ AJAX-powered CRUD operations
  - Slider management for promotional banners
  - Event management for special occasions

- **Content Management**
  - ✅ FAQ management with multilingual support
  - ✅ Settings module with system-wide configurations
  - ✅ Caching support for improved performance

- **Location Management**
  - ✅ Country, Governorate, and City management
  - ✅ AJAX-powered cascading dropdowns
  - ✅ Shipping price management by location

### 🌐 Frontend Features (In Development)

- User registration and authentication
- Product browsing and search
- Shopping cart functionality
- Checkout process
- User profile management
- Order history and tracking
- Wishlist management

### 🔧 Technical Features

- **Architecture**
  - Repository-Service design pattern
  - Clean code structure and separation of concerns
  - Dependency injection throughout the application
  - Interface-based programming for flexibility

- **Multilingual Support**
  - RTL/LTR layout support
  - Locale-based routing
  - Translatable database fields
  - Language switcher

- **Performance**
  - Database query optimization
  - Redis caching implementation
  - Lazy loading and eager loading strategies
  - Queue system for background processing

- **Developer Experience**
  - Laravel Telescope for debugging
  - Pest for testing
  - Laravel Pint for code formatting
  - Comprehensive error handling

---

## 🚀 Tech Stack

### Backend

| Technology | Version | Purpose |
|------------|---------|---------|
| **Laravel** | 12.x | PHP Framework |
| **PHP** | 8.2+ | Programming Language |
| **MySQL** | 8.0+ | Primary Database |
| **Redis** | Latest | Caching & Session Management |
| **Livewire** | 3.7 | Dynamic Frontend Components |

### Frontend

| Technology | Version | Purpose |
|------------|---------|---------|
| **Tailwind CSS** | 4.0 | Utility-First CSS Framework |
| **Vite** | 7.x | Build Tool & Asset Bundling |
| **Axios** | 1.11+ | HTTP Client |
| **Alpine.js** | - | Lightweight JavaScript Framework |

### Key Laravel Packages

| Package | Purpose |
|---------|---------|
| **yajra/laravel-datatables-oracle** | Advanced data tables with server-side processing |
| **mcamara/laravel-localization** | Multi-language routing and localization |
| **spatie/laravel-translatable** | Eloquent model translations |
| **ichtrojan/laravel-otp** | One-Time Password authentication |
| **livewire/livewire** | Reactive UI components |
| **cviebrock/eloquent-sluggable** | Automatic slug generation |
| **php-flasher/flasher-notyf-laravel** | Beautiful toast notifications |
| **anhskohbo/no-captcha** | reCAPTCHA integration |
| **predis/predis** | Redis client for PHP |

### Development Tools

- **Laravel Telescope** - Application debugging and monitoring
- **Laravel Pint** - Code style fixer
- **Pest PHP** - Testing framework
- **Laravel Sail** - Docker development environment

---

## 💻 System Requirements

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x
- **NPM** >= 9.x
- **MySQL** >= 8.0 or **MariaDB** >= 10.5
- **Redis** >= 6.0 (optional but recommended)
- **Git** for version control

---

## 📦 Installation

### Quick Setup

Follow these steps to get the project up and running on your local machine:

#### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/ecommerce-platform.git
cd ecommerce-platform
```

#### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

#### 3. Environment Configuration

```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### 4. Configure Database

Edit the `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommrece
DB_USERNAME=root
DB_PASSWORD=your_password
```

#### 5. Run Migrations

```bash
# Run database migrations
php artisan migrate

# (Optional) Seed the database with sample data
php artisan db:seed
```

#### 6. Build Assets

```bash
# For development
npm run dev

# For production
npm run build
```

#### 7. Start the Development Server

**Option 1: Using Artisan (Simple)**
```bash
php artisan serve
```

**Option 2: Using Composer Script (Recommended)**
```bash
composer dev
```
This will concurrently run:
- PHP development server (http://localhost:8000)
- Queue worker
- Vite development server

**Option 3: Using Laravel Sail (Docker)**
```bash
./vendor/bin/sail up
```

#### 8. Access the Application

- **Frontend:** http://localhost:8000
- **Admin Dashboard:** http://localhost:8000/dashboard
- **Telescope (Debug):** http://localhost:8000/telescope

---

## 📁 Project Structure

```
ecommerce-platform/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Dashboard/          # Admin dashboard controllers
│   │   │   └── Controller.php
│   │   └── Requests/               # Form request validation classes
│   ├── Livewire/                   # Livewire components
│   ├── Models/                     # Eloquent models
│   ├── Repositories/               # Data access layer
│   │   ├── Auth/                   # Authentication repositories
│   │   └── Dashboard/              # Dashboard repositories
│   ├── Services/                   # Business logic layer
│   │   ├── Auth/                   # Authentication services
│   │   └── Dashboard/              # Dashboard services
│   ├── Notifications/              # Email/SMS notifications
│   ├── Providers/                  # Service providers
│   └── Utils/                      # Helper utilities
├── config/                         # Application configuration
├── database/
│   ├── migrations/                 # Database migrations
│   ├── seeders/                    # Database seeders
│   └── factories/                  # Model factories
├── lang/                           # Language files (en, ar)
├── public/                         # Public assets
├── resources/
│   ├── css/                        # Stylesheets
│   ├── js/                         # JavaScript files
│   └── views/                      # Blade templates
├── routes/
│   ├── web.php                     # Web routes
│   ├── api.php                     # API routes
│   └── console.php                 # Console commands
├── storage/                        # File storage
├── tests/                          # Test files
├── .env.example                    # Environment example file
├── composer.json                   # PHP dependencies
├── package.json                    # Node dependencies
└── vite.config.js                  # Vite configuration
```

---

## ⚙️ Configuration

### Application Settings

Key configuration files to review:

- **`config/app.php`** - Application settings, locale, timezone
- **`config/database.php`** - Database connections
- **`config/cache.php`** - Caching configuration
- **`config/queue.php`** - Queue configuration
- **`config/mail.php`** - Email settings

### Multi-Language Setup

The application supports multiple languages with RTL support:

```php
// Available locales
'supportedLocales' => ['en', 'ar']
```

Language files are located in the `lang/` directory.

### Cache Configuration

For optimal performance, configure Redis in `.env`:

```env
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=database
```

---

## 🔨 Development

### Running Tests

```bash
# Run all tests
composer test

# Run specific test file
php artisan test tests/Feature/ProductTest.php
```

### Code Formatting

```bash
# Format code with Laravel Pint
./vendor/bin/pint
```

### Database Operations

```bash
# Create new migration
php artisan make:migration create_table_name

# Rollback migrations
php artisan migrate:rollback

# Fresh migration (WARNING: Destroys all data)
php artisan migrate:fresh --seed
```

### Clearing Cache

```bash
# Clear application cache
php artisan cache:clear

# Clear configuration cache
php artisan config:clear

# Clear route cache
php artisan route:clear

# Clear view cache
php artisan view:clear

# Clear all caches
php artisan optimize:clear
```

### Queue Workers

```bash
# Start queue worker
php artisan queue:work

# With specific queue
php artisan queue:work --queue=high,default

# Listen for new jobs
php artisan queue:listen
```

---

## 🗄️ Database Schema

### Core Tables

The application uses the following main database tables:

**User Management:**
- `users` - Customer accounts
- `admins` - Administrator accounts
- `roles` - User roles
- `permissions` - Access permissions

**Product Management:**
- `products` - Product catalog
- `product_variants` - Product variations
- `product_images` - Product image gallery
- `product_previews` - Preview images
- `product_tags` - Product tagging
- `categories` - Product categories
- `brands` - Product brands
- `attributes` - Product attributes
- `attribute_values` - Attribute value options
- `variant_attributes` - Variant-attribute relationships

**Order Management:**
- `orders` - Customer orders
- `order_items` - Order line items
- `transactions` - Payment transactions
- `wishlists` - Customer wishlists

**Location & Shipping:**
- `countries` - Country list
- `governorates` - State/province list
- `cities` - City list
- `shipping_prices` - Shipping costs by location

**Content & Settings:**
- `faqs` - Frequently asked questions
- `settings` - Application settings
- `coupons` - Discount coupons
- `sliders` - Homepage sliders
- `tags` - Content tags
- `events` - Special events

### ERD Diagrams

- **Relation Table:** [https://erdplus.com/diagrams/163850](https://erdplus.com/diagrams/163850)
- **Database Diagram:** [https://erdplus.com/diagrams/163825](https://erdplus.com/diagrams/163825)

---

## 🤝 Contributing

Contributions are welcome! Since this project is under active development, please follow these guidelines:

1. **Fork the repository**
2. **Create a feature branch** (`git checkout -b feature/amazing-feature`)
3. **Commit your changes** (`git commit -m 'Add some amazing feature'`)
4. **Push to the branch** (`git push origin feature/amazing-feature`)
5. **Open a Pull Request**

### Code Standards

- Follow PSR-12 coding standards
- Write meaningful commit messages
- Add tests for new features
- Update documentation as needed
- Run `./vendor/bin/pint` before committing

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---


<div align="center">

**Made with ❤️ using Laravel**

⭐ Star this repository if you find it helpful!

</div>