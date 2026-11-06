# Student Management System

A Laravel web application for managing students, courses and course registrations (BUC3131, Coursework Two).

## Installation
1. `git clone https://github.com/Evel454/student_mgt_sys.git`
2. `cd student_mgt_sys`
3. `composer install`
4. `copy .env.example .env`
5. `php artisan key:generate`

## Database setup
1. Start Apache and MySQL in XAMPP.
2. Create an empty database named `student_mgt_sys` in phpMyAdmin.
3. In `.env`, set `DB_CONNECTION=mysql`, `DB_DATABASE=student_mgt_sys`, `DB_USERNAME=root` and leave `DB_PASSWORD` empty.
4. Run `php artisan migrate --seed`
5. Run `php artisan serve` and open http://127.0.0.1:8000

## Sample logins (password: password123)
| Role | Email |
|---|---|
| Administrator (Registry) | admin@mubs.ac.ug |
| Lecturer | lecturer@mubs.ac.ug |
| Student | student@mubs.ac.ug |