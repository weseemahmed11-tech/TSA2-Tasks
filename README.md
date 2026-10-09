# Tasks for Today Management System

Technical Summative Assessment 2 continuation project built with CodeIgniter 4.

## Requirements

- PHP 8.2 or newer with `intl`, `mbstring`, and `mysqli` enabled
- Composer 2
- MySQL or MariaDB

## Setup

1. Install the project dependencies with `composer install`.
2. Create a MySQL database named `tasks_tsa2`.
3. Copy `.env.example` to `.env` and set the database username, password, host, and port.
4. Run the migration and application seeder:

   ```powershell
   php spark migrate
   php spark db:seed Tsa1Seeder
   ```

5. Start the application with `php spark serve` and open the configured base URL.

The seeder creates eight tasks across four dates, including `2026-10-09`, and exactly one demo user. Run the second migration after the TSA1 migration has already been applied.

## Demo login

- Username: `demo.user`
- Password: `Password123`

## Routes

- `/` — Welcome page showing only tasks whose `task_date` is today
- `/tasks` — Task List page showing all tasks ordered by date
- `/profile` — Profile page showing the single demo user
- `/about` — About page identifying the developer

## Database

The original application migration is `app/Database/Migrations/2026-10-09-000001_CreateTasksAndUsers.php`. TSA2 changes are in `app/Database/Migrations/2026-10-09-000002_AddTsa2AuthenticationAndArchiving.php`.
The application seeder is `app/Database/Seeds/Tsa1Seeder.php`.

The `tasks` table contains `title`, `status`, `task_date`, `created_at`, and `is_archived`. The `users` table contains `username`, `full_name`, `email`, `password`, and `created_at`.

The TSA2 database export is `database/tsa2_tasks_export.sql`.
