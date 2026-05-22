# IKO OPTIC LTD - ISP Website & Admin Dashboard

A modern, premium ISP company website and admin dashboard system built with PHP 8+, Tailwind CSS, and Alpine.js.

## Tech Stack

- **Frontend:** PHP 8+, HTML5, Tailwind CSS (CDN), Alpine.js, Responsive Mobile-First
- **Backend:** PHP MVC Architecture, MySQL/MariaDB
- **Auth:** Session-based with Role-Based Access Control
- **Design:** Green (#16A34A) + Dark Navy branding, Dark mode, Glassmorphism

## Quick Start

### 1. Requirements
- PHP 8.0+
- MySQL 5.7+ / MariaDB 10.3+
- Apache or PHP built-in server

### 2. Setup Database

```bash
# Option A: Run the setup script
./setup.sh

# Option B: Manual setup
mysql -u root -p < database/migrations/001_create_tables.sql
mysql -u root -p < database/seeds/seed.sql
```

### 3. Configure Environment

Edit `.env` with your database credentials:
```
DB_HOST=localhost
DB_NAME=ikooptic
DB_USER=root
DB_PASS=your_password
```

### 4. Start Development Server

```bash
php -S localhost:8000 -t public
```

### 5. Access

- **Website:** http://localhost:8000
- **Admin Dashboard:** http://localhost:8000/admin

### Default Admin Credentials
- Email: `admin@ikooptic.co.ke`
- Password: `password`

## Project Structure

```
ikooptic/
├── app/
│   ├── Controllers/     # Route handlers
│   ├── Core/            # Framework core (Router, Database, Model, Controller)
│   ├── Middleware/       # Auth & Role middleware
│   ├── Models/          # Database models
│   └── Views/           # PHP templates
│       ├── admin/       # Admin dashboard views
│       ├── auth/        # Login views
│       ├── layouts/     # Shared layouts
│       └── public/      # Public website views
├── config/              # App & database config
├── database/
│   ├── migrations/      # SQL schema
│   └── seeds/           # Initial data
├── public/              # Web root
│   ├── assets/          # CSS, JS, images, uploads
│   ├── .htaccess        # Apache rewrite rules
│   └── index.php        # Entry point
├── routes/              # Route definitions
├── storage/             # Logs, cache, sessions
├── .env                 # Environment config
└── setup.sh             # Setup script
```

## Features

### Public Website
- Hero section with CTAs
- Services showcase (8 services)
- Dynamic packages from database
- Coverage areas with live checker
- Testimonials
- FAQ accordion
- Blog/News
- Contact form with AJAX submission
- WhatsApp integration
- Dark mode toggle
- Fully responsive

### Admin Dashboard
- Dashboard with metrics
- Coverage area CRUD
- Package management CRUD
- Client request management with status workflow
- Blog CMS with image upload
- Media library
- User management with RBAC
- Site settings (CMS)
- Activity logging

### Security
- CSRF token protection
- XSS prevention (htmlspecialchars)
- Password hashing (bcrypt)
- Prepared statements (SQL injection prevention)
- Session-based authentication
- Activity audit logs

## User Roles

| Role | Permissions |
|------|------------|
| Super Admin | Full access to all features |
| Content Manager | Blog, Media, Settings, Coverage |
| Support Team | Requests, Coverage viewing |

## Deployment (Apache)

1. Point document root to `/public`
2. Ensure `mod_rewrite` is enabled
3. Set proper file permissions:
   ```bash
   chmod -R 755 public/assets/uploads
   chmod -R 755 storage/
   ```
4. Update `.env` with production credentials
5. Set `APP_DEBUG=false`
