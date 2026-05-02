# MyPortfolio

Professional portfolio website built with Laravel 12, Filament, Tailwind CSS, and Vite.  
The project combines a public-facing portfolio with a Filament admin panel for managing projects, skills, experience, resume files, SEO settings, and contact messages.

## Highlights

- Public landing page with hero, about, skills, experience, featured projects, resume CTA, and contact section
- Project listing and case study detail pages
- Filament admin panel at `/admin`
- Contact form with validation, honeypot spam protection, persistence, and email notification
- Centralized site settings and SEO settings
- Feature tests for public pages and contact flow

## Tech Stack

- PHP 8.2+
- Laravel 12
- Filament 5
- Tailwind CSS 4
- Vite 7
- SQLite for tests, MySQL/MariaDB recommended for local and production

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Set your database in `.env`, then run:

```bash
php artisan migrate
php artisan storage:link
npm install
npm run build
```

For local development:

```bash
composer run dev
```

That command runs:

- Laravel development server
- queue listener
- log watcher
- Vite dev server

## Required Configuration

At minimum, review these values in `.env`:

```env
APP_NAME="MyPortfolio"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myportfolio
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
MAIL_CONTACT_ADDRESS="hello@example.com"
```

`MAIL_CONTACT_ADDRESS` is the inbox that receives portfolio contact form notifications.

## Admin Panel

Open:

```text
/admin
```

Create an admin user if needed:

```bash
php artisan make:filament-user
```

Use the admin panel to manage:

- site settings
- SEO settings
- projects
- skills
- experiences
- resume files
- contact messages

## Testing

Run:

```bash
php artisan test
```

Current test coverage includes:

- home page rendering
- project detail page access and unique view counting
- contact form redirect
- contact form submission and notification
- honeypot rejection

## Production Notes

- Use MySQL or MariaDB in production
- Configure a real mail transport instead of `log`
- Run a queue worker if you later move email sending back to queued jobs
- Set `APP_URL` correctly for canonical and social meta tags
- Upload real favicon, OG image, profile photo, resume file, and project media from admin

## What Was Improved

- Removed duplicate project detail route
- Fixed broken contact flow between form and backend validation
- Added missing mail notification class and email template
- Added configurable contact notification recipient
- Added safe global site/SEO data handling for all pages
- Improved project page SEO metadata
- Fixed test portability by making the MySQL-specific enum migration safe for SQLite tests
- Replaced default Laravel README with project-specific documentation

## Remaining Gaps

The codebase is now materially cleaner, but these are still worth improving next:

- add seeders for demo-ready portfolio content
- add image fallbacks in `public/images` to match current accessor defaults
- add browser-level UI checks for responsive layout and visual regressions
- add rate-limit/log monitoring for high-volume contact spam scenarios
