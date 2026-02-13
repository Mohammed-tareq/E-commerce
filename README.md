# 🛒 E-Commerce Platform

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-3.7-FB70A9?style=for-the-badge&logo=livewire&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind-4.0-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-7.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)

**A modern, full-featured e-commerce platform built with Laravel 12 and cutting-edge technologies.**

[🚀 Quick Start](#-installation) • [✨ Features](#-features) • [🛠️ Tech Stack](#-tech-stack) • [📚 Docs](#-project-structure)

</div>

---

## ⚠️ Project Status

> **🚧 WORK IN PROGRESS - UNDER ACTIVE DEVELOPMENT**
>
> This project is currently in active development. Many features and system components are still being implemented and refined. The codebase is not production-ready and is subject to significant changes. Use at your own discretion for development and testing purposes only.
>
> **Current Development Phase:** Core modules implementation and testing (as of February 2026)

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
- [Useful Commands](#-useful-commands)
- [Database Schema](#-database-schema)
- [Troubleshooting](#-troubleshooting)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🎯 Overview

This **E-Commerce Platform** is a comprehensive, enterprise-grade solution designed for building modern online stores. Built on **Laravel 12** with a clean **Repository-Service architecture**, it provides a robust foundation for scalable e-commerce applications with multilingual support (English & Arabic).

### ⭐ Key Highlights

- **Multi-Language Support** - Fully internationalized with English and Arabic support (RTL/LTR)
- **Role-Based Access Control** - Granular permissions system for admins and users
- **Modern UI/UX** - Responsive design with Livewire 3.7 for reactive components
- **Advanced Product Management** - Support for product variants, attributes, dynamic pricing, and image galleries
- **Secure Authentication** - OTP-based login with email verification and multi-factor support
- **Real-Time Features** - Event broadcasting via Pusher for live notifications and order updates
- **Performance Optimized** - Redis caching, database query optimization, and queue system

---

## ✨ Features

### 🛡️ Admin Dashboard

#### Authentication & Security
- ✅ OTP-based login and password reset
- ✅ Multi-factor authentication support
- ✅ Secure password recovery with email verification
- ✅ Role and permission management system
- ✅ Admin user management with status control

#### Product Management
- ✅ Wizard-based product creation workflow
- ✅ Product variants with dynamic attributes
- ✅ Multiple image upload with preview and carousel display
- ✅ Image management (upload, delete, fullscreen preview)
- ✅ Bulk operations and batch processing
- ✅ Product status management (active/inactive)
- ✅ SKU auto-generation and management
- ✅ Rich text editor (Summernote) for product descriptions
- ✅ Slug generation for SEO-friendly URLs
- ✅ Yajra DataTables integration for advanced listing with sorting/filtering

#### Catalog Management
- ✅ Categories and subcategories with hierarchical structure
- ✅ Category image management with uploads
- ✅ Brand management with logo support
- ✅ Product attributes with multiple value options
- ✅ Tag system for better product organization
- ✅ Dynamic attribute assignment to products and variants

#### Order & Sales Management
- ✅ Order processing and status tracking
- ✅ Order items management with variant details
- ✅ Transaction history and reporting
- ✅ Order status updates with notifications
- ✅ Admin review management and editing

#### Marketing & Promotions
- ✅ Coupon/discount code management
- ✅ Coupon validation and application logic
- ✅ AJAX-powered CRUD operations
- ✅ Slider management for promotional banners
- ✅ Event management for special occasions
- ✅ Flash sales with time-based display

#### Content Management
- ✅ FAQ management with multilingual support
- ✅ Dynamic pages creation and management
- ✅ Settings module with system-wide configurations
- ✅ Image caching for improved performance

#### Location Management
- ✅ Country, Governorate, and City management
- ✅ AJAX-powered cascading dropdowns
- ✅ Shipping price management by location

### 🌐 Frontend Features

#### User Account & Authentication
- ✅ User registration with email verification
- ✅ OTP-based login
- ✅ User profile management
- ✅ Address management with location selection
- ✅ Password reset functionality

#### Shopping Features
- ✅ Dynamic product catalog browsing
- ✅ Product search and filtering by category/brand
- ✅ Advanced filtering with price range, categories, and brands
- ✅ Product details page with reviews and related products
- ✅ Shopping cart with quantity adjustments
- ✅ Real-time cart updates and subtotal calculation
- ✅ Wishlist functionality with persistent storage
- ✅ Variant and size selection

#### Checkout & Orders
- ✅ Multi-step checkout process
- ✅ Shipping address and method selection
- ✅ Coupon/discount code application
- ✅ Order summary with pricing breakdown
- ✅ Order confirmation and tracking
- ✅ Order history and status updates

#### Additional Features
- ✅ Shop page with advanced filtering
- ✅ Category and brand browsing
- ✅ FAQ section for customer support
- ✅ Contact us form with backend handling
- ✅ Dynamic homepage with sliders and featured products
- ✅ New arrivals, flash sales, and weekly deals sections

### 🔧 Technical Features

#### Architecture & Design Patterns
- ✅ Repository-Service design pattern for clean separation of concerns
- ✅ Dependency injection throughout the application
- ✅ Interface-based programming for maximum flexibility
- ✅ Service providers for modular application structure

#### Multilingual Support
- ✅ RTL/LTR layout support for Arabic and English
- ✅ Locale-based routing with URL prefixes
- ✅ Translatable database fields using Spatie
- ✅ Language switcher in header navigation
- ✅ Localized validation messages and notifications

#### Performance Optimization
- ✅ Database query optimization with eager loading
- ✅ Redis caching for frequently accessed data
- ✅ Queue system for background job processing
- ✅ Asset minification and bundling with Vite
- ✅ Lazy loading strategies for images
- ✅ Database indexing on foreign keys and frequent queries

#### Real-Time Features
- ✅ Event broadcasting via Pusher WebSockets
- ✅ Real-time admin notifications for new orders
- ✅ Live cart and wishlist updates
- ✅ Real-time order status updates

#### Developer Experience
- ✅ Laravel Telescope for application debugging and monitoring
- ✅ Pest for modern, readable testing framework
- ✅ Laravel Pint for consistent code formatting
- ✅ Comprehensive error handling and logging
- ✅ Debug bar for query inspection and performance analysis

---

## 🚀 Tech Stack

### Backend

| Technology | Version | Purpose |
|------------|---------|---------|
| **Laravel** | 12.x | Modern PHP Framework |
| **PHP** | 8.2+ | Server-side Programming Language |
| **MySQL** | 8.0+ | Relational Database |
| **Redis** | Latest | Caching & Session Management |
| **Livewire** | 3.7+ | Reactive Component Framework |
| **Pusher** | 7.2+ | Real-time WebSocket Broadcasting |

### Frontend

| Technology | Version | Purpose |
|------------|---------|---------|
| **Tailwind CSS** | 4.0+ | Utility-First CSS Framework |
| **Vite** | 7.x | Modern Build Tool & Bundler |
| **Axios** | 1.11+ | Promise-based HTTP Client |
| **Bootstrap** | 5.2+ | Responsive Component Library |
| **Sass/SCSS** | 1.56+ | CSS Preprocessor |
| **Laravel Echo** | 2.3+ | WebSocket Event Broadcasting |

### Core Laravel Packages

| Package | Version | Purpose |
|---------|---------|---------|
| **yajra/laravel-datatables-oracle** | 12 | Advanced server-side data tables |
| **mcamara/laravel-localization** | 2.3+ | Multi-language routing & localization |
| **spatie/laravel-translatable** | 6.11+ | Eloquent model translations |
| **ichtrojan/laravel-otp** | 2.0+ | One-Time Password authentication |
| **livewire/livewire** | 3.7+ | Reactive UI components |
| **cviebrock/eloquent-sluggable** | 12.0+ | Automatic slug generation |
| **php-flasher/flasher-laravel** | 2.2+ | Beautiful toast notifications |
| **anhskohbo/no-captcha** | 3.7+ | reCAPTCHA v2 integration |
| **predis/predis** | 3.3+ | Redis client for PHP |
| **codezero/laravel-unique-translation** | 4.3+ | Unique validation for translations |

### Development Tools & Packages

| Package | Purpose |
|---------|---------|
| **laravel/telescope** | Application debugging and monitoring |
| **laravel/pint** | Code style fixer (PSR-12) |
| **pestphp/pest** | Modern testing framework |
| **laravel/sail** | Docker development environment |
| **fruitcake/laravel-debugbar** | Query inspector and performance profiler |
| **laravel/pail** | Tail application logs |
| **mockery/mockery** | Mocking library for tests |
| **fakerphp/faker** | Fake data generator for factories |

### Additional Tools

- **Git** - Version control system
- **Composer** - PHP dependency manager
- **NPM** - Node.js package manager
- **Docker** (optional) - Containerization with Laravel Sail

---

## 📦 Installation

### Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x with npm >= 9.x
- **MySQL** >= 8.0 or **MariaDB** >= 10.5
- **Redis** >= 6.0 (recommended for caching)
- **Git** for version control
- A code editor (VS Code, PHPStorm, etc.)

> **Tip:** Use [Laravel Sail](https://laravel.com/docs/12/sail) for Docker-based development if you prefer containerized setup.

### Step 1: Clone the Repository

```bash
git clone https://github.com/yourusername/ecommerce-platform.git
cd ecommerce-platform
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

If you face any issues, try clearing Composer cache:
```bash
composer clear-cache
composer install
```

### Step 3: Install Node.js Dependencies

```bash
npm install
```

### Step 4: Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

Open `.env` and configure your application:

```env
APP_NAME=Ecommerce
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=your_password

# Redis Configuration (optional but recommended)
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Broadcasting (optional - for real-time features)
BROADCAST_CONNECTION=pusher
PUSHER_APP_ID=your_pusher_id
PUSHER_APP_KEY=your_pusher_key
PUSHER_APP_SECRET=your_pusher_secret
PUSHER_APP_CLUSTER=mt1

# Mail Configuration (for notifications)
MAIL_MAILER=log

# Localization
APP_LOCALE=en
APP_FALLBACK_LOCALE=en
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

This creates a unique encryption key in your `.env` file.

### Step 6: Database Setup

#### Create Database (if not already created)

```sql
CREATE DATABASE ecommerce CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### Run Migrations

```bash
php artisan migrate
```

#### (Optional) Seed Sample Data

```bash
php artisan db:seed
```

This populates the database with sample data for testing.

### Step 7: Build Frontend Assets

#### For Development
```bash
npm run dev
```

#### For Production
```bash
npm run build
```

### Step 8: Start the Development Server

#### Option A: Using Artisan (Simple)
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

#### Option B: Using Composer Script (Recommended)
```bash
composer dev
```

This runs:
- PHP development server on `http://localhost:8000`
- Queue worker for background jobs
- Vite development server with hot module replacement

#### Option C: Using Laravel Sail (Docker)
```bash
./vendor/bin/sail up
```

### Step 9: Access the Application

| URL | Purpose |
|-----|---------|
| `http://localhost:8000` | Frontend Home Page |
| `http://localhost:8000/en/dashboard` | Admin Dashboard (English) |
| `http://localhost:8000/ar/dashboard` | Admin Dashboard (Arabic) |
| `http://localhost:8000/telescope` | Laravel Telescope (Debugging) |
| `http://localhost:8000/admin` | Legacy Admin Path |

### Quick Setup Script

Alternatively, use the built-in setup script:

```bash
composer setup
```

This runs all steps automatically:
1. ✅ Installs Composer dependencies
2. ✅ Creates `.env` file
3. ✅ Generates application key
4. ✅ Runs database migrations
5. ✅ Installs NPM dependencies
6. ✅ Builds frontend assets

### Verification

To verify your setup, run:

```bash
php artisan tinker

# Inside tinker shell, try:
>>> User::count()
=> 0

>>> exit()
```

---

## 💻 System Requirements

| Requirement | Minimum | Recommended |
|------------|---------|-------------|
| **PHP** | 8.2 | 8.3+ |
| **Composer** | 2.0 | 2.7+ |
| **Node.js** | 18.x | 20.x+ |
| **npm** | 9.x | 10.x+ |
| **MySQL** | 8.0 | 8.4+ |
| **Redis** | 6.0 | 7.0+ |
| **Disk Space** | 500MB | 1GB+ |
| **RAM** | 512MB | 2GB+ |

---

## 📁 Project Structure

```
ecommerce-platform/
│
├── app/                           # Application core code
│   ├── Http/
│   │   ├── Controllers/           # Application controllers
│   │   │   ├── Dashboard/         # Admin dashboard controllers
│   │   │   ├── Website/           # Frontend controllers
│   │   │   └── Auth/              # Authentication controllers
│   │   ├── Middleware/            # HTTP middleware
│   │   └── Requests/              # Form request validation classes
│   │
│   ├── Models/                    # Eloquent ORM models
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Order.php
│   │   ├── Category.php
│   │   ├── Coupon.php
│   │   └── ... (other models)
│   │
│   ├── Livewire/                  # Livewire reactive components
│   │   ├── Dashboard/             # Admin components
│   │   ├── Website/               # Frontend components
│   │   └── General/               # Shared components
│   │
│   ├── Repositories/              # Data access layer (Repository Pattern)
│   │   ├── Auth/                  # Authentication repositories
│   │   └── Dashboard/             # Dashboard repositories
│   │
│   ├── Services/                  # Business logic layer (Service Layer)
│   │   ├── Auth/
│   │   ├── Dashboard/
│   │   └── Website/
│   │
│   ├── Notifications/             # Email/SMS notifications
│   ├── Mail/                      # Mailable classes
│   ├── Providers/                 # Service providers
│   └── Utils/                     # Helper utilities & helpers
│
├── bootstrap/                     # Bootstrap files
│   ├── app.php
│   ├── providers.php
│   └── cache/
│
├── config/                        # Configuration files
│   ├── app.php                    # Application configuration
│   ├── auth.php                   # Authentication config
│   ├── broadcasting.php           # Broadcasting (Pusher) config
│   ├── cache.php                  # Cache configuration
│   ├── database.php               # Database configuration
│   ├── mail.php                   # Email configuration
│   ├── queue.php                  # Queue configuration
│   └── ... (other configs)
│
├── database/
│   ├── migrations/                # Database schema migrations
│   ├── seeders/                   # Database seeders
│   ├── factories/                 # Model factories for testing
│   └── database.sqlite
│
├── lang/                          # Language/Translation files
│   ├── en/                        # English translations
│   │   ├── messages.php
│   │   ├── validation.php
│   │   └── ...
│   └── ar/                        # Arabic translations
│       ├── messages.php
│       └── ...
│
├── public/                        # Publicly accessible files
│   ├── index.php                  # Application entry point
│   ├── favicon.ico
│   ├── robots.txt
│   ├── assets/                    # Static assets (images, fonts)
│   ├── uploads/                   # User-uploaded files
│   ├── build/                     # Vite build output
│   └── vendor/                    # Public vendor assets
│
├── resources/
│   ├── css/                       # Stylesheets (Tailwind, SCSS)
│   │   ├── app.scss
│   │   └── ...
│   ├── js/                        # JavaScript files
│   │   ├── app.js
│   │   ├── bootstrap.js
│   │   └── ...
│   ├── sass/                      # Sass/SCSS files
│   └── views/                     # Blade templates
│       ├── layouts/               # Layout templates
│       ├── dashboard/             # Admin views
│       ├── website/               # Frontend views
│       └── ...
│
├── routes/                        # Application routes
│   ├── web.php                    # Web routes
│   ├── api.php                    # API routes (if applicable)
│   ├── dashboard.php              # Dashboard routes
│   ├── channels.php               # WebSocket channels (Broadcasting)
│   └── console.php                # Console/Artisan commands
│
├── storage/                       # Application storage
│   ├── app/                       # Application storage files
│   │   ├── public/                # Public storage (symlinked)
│   │   └── uploads/
│   ├── framework/                 # Framework storage
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/
│   ├── logs/                      # Application logs
│   └── debugbar/
│
├── tests/                         # Test files
│   ├── Unit/                      # Unit tests
│   ├── Feature/                   # Feature/Integration tests
│   ├── TestCase.php               # Base test case
│   └── Pest.php                   # Pest configuration
│
├── vendor/                        # Composer dependencies (auto-generated)
├── node_modules/                  # NPM dependencies (auto-generated)
│
├── .env.example                   # Environment example
├── .env                           # Environment configuration
├── .gitignore                     # Git ignore rules
├── composer.json                  # PHP dependencies
├── composer.lock                  # Locked PHP dependencies
├── package.json                   # Node dependencies
├── package-lock.json              # Locked Node dependencies
├── phpunit.xml                    # PHPUnit test configuration
├── vite.config.js                 # Vite build configuration
└── README.md                      # This file
```

### Key Directory Purposes

| Directory | Purpose |
|-----------|---------|
| `app/Models` | Eloquent models defining database structure |
| `app/Services` | Core business logic away from controllers |
| `app/Repositories` | Data access abstraction layer |
| `app/Livewire` | Reactive component logic |
| `resources/views` | Blade template files |
| `database/migrations` | Database schema definitions |
| `database/seeders` | Sample data population |
| `routes` | Application routing definitions |
| `config` | Configuration settings for packages |
| `storage/logs` | Application error and debug logs |
| `tests` | Unit and feature tests |

---

## ⚙️ Configuration

### Application Settings

Key configuration files to review and customize:

| File | Purpose |
|------|---------|
| `config/app.php` | App name, locale, timezone, providers |
| `config/database.php` | Database connection settings |
| `config/cache.php` | Cache driver and settings |
| `config/queue.php` | Queue driver and settings |
| `config/mail.php` | Email configuration |
| `config/filesystems.php` | Storage disk configurations |
| `config/broadcasting.php` | Pusher/WebSocket settings |

### Multi-Language Setup

The application comes pre-configured with English and Arabic support:

```php
// Supported locales
'supportedLocales' => ['en', 'ar']

// Set locale in .env
APP_LOCALE=en
APP_FALLBACK_LOCALE=en
```

**Adding a new language:**

1. Create language files in `lang/xx/` (replace `xx` with locale code)
2. Update supported locales in configuration
3. Update language switcher in header navigation
4. Add RTL support if needed in CSS

### Cache Configuration

For optimal performance, configure Redis:

```env
# In .env
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Redis settings
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### Broadcasting Setup (Real-Time Features)

For real-time notifications, configure Pusher:

```env
BROADCAST_CONNECTION=pusher
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=mt1
```

### File Storage

Configure storage disks in `config/filesystems.php`:

```php
'disks' => [
    'local' => [ /* ... */ ],
    'public' => [ /* ... */ ],
    'categories' => [ /* category images */ ],
    'products' => [ /* product images */ ],
    'sliders' => [ /* slider images */ ],
],
```

---

## 🔨 Development

### Running Tests

```bash
# Run all tests (Unit + Feature)
composer test

# Run specific test file
php artisan test tests/Feature/ProductTest.php

# Run tests with coverage report
php artisan test --coverage

# Run tests in parallel
php artisan test --parallel
```

### Code Quality & Formatting

```bash
# Format code with Laravel Pint (PSR-12)
./vendor/bin/pint

# Format specific file
./vendor/bin/pint app/Models/Product.php

# Check code without fixing
./vendor/bin/pint --test
```

### Debugging Tools

**Using Laravel Telescope:**
```
http://localhost:8000/telescope
```

Inspect:
- HTTP requests and responses
- Database queries
- Cached data
- Events
- Logs
- Mail

**Using DebugBar:**
Shows automatically in development environment. Click the debugbar at bottom to:
- View SQL queries
- Check performance
- Monitor cache hits
- Inspect variables

### Database Operations

```bash
# Create a new migration
php artisan make:migration create_products_table

# Run pending migrations
php artisan migrate

# Rollback last batch of migrations
php artisan migrate:rollback

# Rollback all migrations
php artisan migrate:reset

# Reset and re-run all migrations (CAUTION: Destroys data)
php artisan migrate:fresh

# Fresh migration with seeding
php artisan migrate:fresh --seed

# Show migration status
php artisan migrate:status
```

### Tinker Shell

Interactive PHP shell for debugging:

```bash
php artisan tinker

# Inside tinker:
>>> User::all()
>>> Product::where('status', 'active')->count()
>>> Cache::get('key')
>>> exit()
```

---

## 🛠️ Useful Commands

### Application Commands

```bash
# Serve the application
php artisan serve

# Serve on specific host and port
php artisan serve --host=0.0.0.0 --port=8080

# Generate application key (run once)
php artisan key:generate

# Optimize application (compile config and routes)
php artisan optimize

# Clear all caches
php artisan optimize:clear
```

### Cache Management

```bash
# Clear application cache
php artisan cache:clear

# Clear configuration cache
php artisan config:clear

# Clear route cache
php artisan route:clear

# Clear view cache
php artisan view:clear

# Clear all caches and optimizations
php artisan optimize:clear

# View cache contents
php artisan cache:show
```

### Queue & Jobs

```bash
# Start queue worker
php artisan queue:work

# Start worker with specific queue
php artisan queue:work --queue=high,default

# Listen for new queue jobs
php artisan queue:listen

# Process failed jobs
php artisan queue:retry

# Show queue status
php artisan queue:failed
```

### Database Seeding

```bash
# Run all seeders
php artisan db:seed

# Run specific seeder
php artisan db:seed --class=ProductSeeder

# Reset and reseed (with migrations)
php artisan migrate:fresh --seed
```

### Code Generation

```bash
# Make model (with migration, factory, seeder)
php artisan make:model Product -mfs

# Make controller
php artisan make:controller ProductController

# Make request (form validation)
php artisan make:request StoreProductRequest

# Make migration
php artisan make:migration create_products_table

# Make factory
php artisan make:factory ProductFactory

# Make seeder
php artisan make:seeder ProductSeeder

# Make middleware
php artisan make:middleware CheckPermission

# Make Livewire component
php artisan livewire:make ProductForm
```

### Broadcasting

```bash
# Test Pusher connection
php artisan tinker
>>> event(new \App\Events\OrderPlaced($order))
```

### Artisan Command Listing

```bash
# Show all available commands
php artisan list

# Show command help
php artisan help migrate

# Show Laravel version
php artisan --version
```

### Frontend Asset Building

```bash
# Watch assets in development
npm run dev

# Build assets for production
npm run build

# Start Vite server
npm run dev

# Check build output
npm run build --view
```

### Maintenance Mode

```bash
# Enable maintenance mode
php artisan down

# Enable with custom message
php artisan down --message="Upgrading database"

# Disable maintenance mode
php artisan up
```

---

## 🗄️ Database Schema

### Core Tables Overview

**User Management:**
- `users` - Customer accounts with profile info
- `admins` - Administrator accounts  
- `roles` - User roles (admin, user, etc.)
- `permissions` - System permissions

**Product Management:**
- `products` - Product catalog with metadata
- `product_variants` - Product variations (size, color, etc.)
- `product_images` - Product image gallery
- `product_tags` - Product categorization tags
- `categories` - Product categories
- `brands` - Brand information
- `attributes` - Attribute definitions
- `attribute_values` - Attribute value options

**Order & Commerce:**
- `orders` - Customer orders
- `order_items` - Individual order line items
- `transactions` - Payment transaction records
- `wishlists` - Customer wish lists
- `carts` - Shopping cart data
- `cart_items` - Cart line items

**Catalog & Content:**
- `coupons` - Discount codes
- `faqs` - Frequently asked questions
- `pages` - Dynamic content pages
- `sliders` - Homepage promotional sliders
- `events` - Special events/promotions

**Location & Shipping:**
- `countries` - Country list
- `governorates` - States/provinces
- `cities` - City list

**Settings:**
- `settings` - Application configuration

### Database Relations

For detailed Entity Relationship Diagrams, visit:
- **[Full ERD Diagram](https://erdplus.com/diagrams/163825)**
- **[Relation Diagram](https://erdplus.com/diagrams/163850)**

---

## 🐛 Troubleshooting

### Common Issues & Solutions

#### 1. Migrations Fail

```bash
# Clear cached migrations
php artisan migrate:reset

# Run migrations fresh
php artisan migrate:fresh

# Check migration errors
php artisan migrate --step
```

#### 2. Permission Denied Errors

```bash
# Fix storage permissions
chmod -R 775 storage bootstrap/cache

# Fix on Windows (PowerShell)
icacls "storage" /grant Users:F /T
icacls "bootstrap\cache" /grant Users:F /T
```

#### 3. Redis Connection Failed

```bash
# Check Redis is running
redis-cli ping

# Verify Redis configuration
php artisan tinker
>>> Cache::get('test')
```

#### 4. Assets Not Loading

```bash
# Clear Vite cache and rebuild
rm -rf node_modules package-lock.json
npm install
npm run build

# On Windows:
rmdir /s node_modules
npm install
npm run build
```

#### 5. Database Connection Error

```bash
# Verify database exists and credentials
php artisan tinker
>>> DB::connection()->getPdo()

# Check .env file
cat .env | grep DB_
```

#### 6. Cache/Session Issues

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Or use:
php artisan optimize:clear
```

#### 7. Key Not Generated

```bash
# Generate application key
php artisan key:generate

# Verify it's set in .env
grep APP_KEY .env
```

### Getting Help

- **Documentation:** [Laravel Docs](https://laravel.com/docs)
- **Forum:** [Laravel Forum](https://laracasts.com)
- **Issues:** Check GitHub issues or create a new one
- **Discord:** Join Laravel community servers

---

## 🤝 Contributing

Contributions are welcome! Since this project is under active development, please follow these guidelines:

### Development Workflow

1. **Fork the repository**
   ```bash
   # On GitHub, click the "Fork" button
   ```

2. **Clone your fork**
   ```bash
   git clone https://github.com/your-username/ecommerce-platform.git
   cd ecommerce-platform
   ```

3. **Create a feature branch**
   ```bash
   git checkout -b feature/amazing-feature
   # or for bugfix:
   git checkout -b fix/bug-description
   ```

4. **Make your changes**
   - Write clean, well-documented code
   - Follow PSR-12 coding standards
   - Add tests for new features
   - Update documentation

5. **Format your code**
   ```bash
   ./vendor/bin/pint
   ```

6. **Run tests**
   ```bash
   composer test
   ```

7. **Commit with meaningful messages**
   ```bash
   git commit -m "Add feature: amazing feature description"
   ```

8. **Push to your branch**
   ```bash
   git push origin feature/amazing-feature
   ```

9. **Open a Pull Request**
   - Provide clear description of changes
   - Link related issues
   - Request review from maintainers

### Code Standards

- **PHP:** Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standards
- **Laravel:** Follow [Laravel conventions](https://laravel.com/docs/12/structure)
- **JavaScript:** Use modern ES6+ syntax
- **CSS:** Use Tailwind CSS utilities
- **Git:** Use conventional commits

### Commit Message Format

```
<type>(<scope>): <subject>

<body>

<footer>
```

**Types:**
- `feat:` - New feature
- `fix:` - Bug fix
- `docs:` - Documentation
- `style:` - Code style changes
- `refactor:` - Code refactoring
- `test:` - Adding tests
- `chore:` - Build, CI/CD, dependencies

**Examples:**
```
feat(product): add product filtering by brand
fix(cart): prevent negative quantity values
docs(readme): update installation instructions
```

### Pull Request Checklist

- [ ] Forked and cloned the repository
- [ ] Created descriptive branch name
- [ ] Made changes in a feature branch
- [ ] Ran `./vendor/bin/pint` to format code
- [ ] Ran `composer test` and all tests pass
- [ ] Updated documentation if needed
- [ ] Provided meaningful commit messages
- [ ] Described PR purpose clearly

### Reporting Issues

When reporting bugs, please include:

1. **Clear description** of the issue
2. **Steps to reproduce** the problem
3. **Expected behavior** vs actual behavior
4. **Environment details**:
   - OS (Windows, Linux, macOS)
   - PHP version
   - Laravel version
   - Any error logs

**Example:**
```
Title: Cart quantity cannot be negative

Description:
Users can enter negative quantities in the cart.

Steps to reproduce:
1. Add product to cart
2. Open cart page
3. Enter "-5" in quantity field
4. Submit form

Expected: Show validation error
Actual: Quantity becomes -5
```

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

**You are free to:**
- ✅ Use commercially
- ✅ Modify the code
- ✅ Distribute the software
- ✅ Use privately

**You must:**
- ℹ️ Include the license and copyright notice

---

## 🌍 Community & Support

### Resources

- 📚 **[Documentation](docs/)** - Complete API and feature documentation
- 💬 **[GitHub Discussions](https://github.com/yourusername/ecommerce-platform/discussions)** - Ask questions
- 🐛 **[Issue Tracker](https://github.com/yourusername/ecommerce-platform/issues)** - Report bugs
- 📧 **Email** - contact@yourproject.com

### Quick Links

- [Laravel Documentation](https://laravel.com/docs)
- [Livewire Documentation](https://livewire.laravel.com)
- [Tailwind CSS](https://tailwindcss.com)
- [MySQL Documentation](https://dev.mysql.com/doc)
- [Composer](https://getcomposer.org)

### Related Projects

- [Laravel Bootstrap](https://github.com/laravel/laravel) - Official Laravel skeleton
- [Livewire](https://github.com/livewire/livewire) - Reactive components
- [Spatie Packages](https://spatie.be/open-source) - Quality Laravel packages

---

## 🎯 Roadmap

Planned features and improvements:

### Q1 2026
- [ ] Payment gateway integration (Stripe, PayPal)
- [ ] Email notifications with email queue
- [ ] Advanced reporting and analytics dashboard
- [ ] Customer review system with ratings

### Q2 2026
- [ ] API endpoint documentation (OpenAPI/Swagger)
- [ ] Mobile app (React Native)
- [ ] Inventory management system
- [ ] Multi-vendor support

### Q3 2026
- [ ] AI-powered product recommendations
- [ ] Subscription/recurring orders
- [ ] Advanced search with Elasticsearch
- [ ] User behavior analytics

---

## 📊 Project Statistics

- **Total Controllers:** 20+
- **Total Models:** 25+
- **Database Tables:** 30+
- **Frontend Pages:** 15+
- **Admin Modules:** 12+
- **Lines of Code:** 50,000+

---

<div align="center">

## ⭐ Support

If you find this project helpful, please consider:

- 🌟 **Star the repository** to show your support
- 📢 **Share with friends** who might find it useful
- 🐛 **Report bugs** to help improve the project
- 💡 **Suggest features** via GitHub discussions
- 🤝 **Contribute code** to make it better

</div>

<div align="center">

---

**Made with ❤️ by the Laravel Community**

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)

[⬆ Back to Top](#-ecommerce-platform)

</div>