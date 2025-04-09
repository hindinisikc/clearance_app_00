<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# 📝 Laravel Clearance Request System

This Laravel application allows employees to request clearance through a structured form that includes department, employee, and designated supervisor relationships.

---

## 🚀 Features

- Employees can submit clearance requests.
- Dropdown automatically populates supervisors based on selected employee.
- Admin-style layout using Bootstrap 5 for UI.
- Seeded data for testing: departments, users, employees.

---

## 🛠️ Requirements

- PHP >= 8.1
- Composer
- MySQL or compatible database
- Node.js and npm (optional, for asset compilation)

---

## 🧪 Demo Credentials

| Role       | Email                      | Password |
|------------|----------------------------|----------|
| Supervisor | supervisor1@example.com    | password |
| Employee   | employee1@example.com      | password |

*(if you're seeding test users)*

---

## ⚙️ Installation

Follow these steps to get the app running locally:

```bash
# 1. Clone the repository
git clone https://github.com/your-username/clearance-requests.git
cd clearance-requests

# 2. Install PHP dependencies
composer install

# 3. Copy .env file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Configure your .env database connection
# (DB_DATABASE, DB_USERNAME, DB_PASSWORD)

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Start the local server
php artisan serve
🗂️ Database Structure
clearance_requests
Column	Type
clearance_request_id	INT (PK)
user_id	Foreign Key (employee)
supervisor_id	Foreign Key (supervisor)
department_id	Foreign Key
date_submitted	TIMESTAMP
created_at	TIMESTAMP
updated_at	TIMESTAMP
departments
Column	Type
department_id	INT (PK)
department	STRING
employees
Column	Type
employee_id	INT (PK)
user_id	Foreign Key
supervisor_id	Foreign Key (user_id)
users
Column	Type
id	INT (PK)
name	STRING
email	STRING
password	STRING
is_supervisor	BOOLEAN
🧰 Tech Stack
Laravel 10+

MySQL

Bootstrap 5

Blade Templating Engine

📦 Environment Variables
Ensure the following are set in .env:

env
Copy
Edit
APP_NAME="Clearance Request"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
📌 Notes
Make sure .env is not committed to Git.

Run php artisan migrate:fresh --seed if the database breaks during development.

Supervisor dropdown is auto-updated using AJAX based on selected employee.

