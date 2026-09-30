# Study Dashboard — Full Stack Semester Planner

A dynamic, professional study dashboard built with **HTML5, CSS3, Bootstrap 5, vanilla JavaScript (AJAX/fetch)** on the frontend and **PHP (PDO) + MySQL** on the backend.

Matches the reference UI: dark violet theme, stat cards, today's schedule, upcoming exams, weekly study chart, and a live focus timer — plus full pages for Tasks, Subjects, Exams, Notes, Resources, Calendar, Progress and Settings, all backed by a real database (no mock/static data).

## Features
- **Dashboard** — classes today, pending tasks, weekly study hours, overall progress, today's schedule, upcoming exams, weekly bar chart, focus timer
- **Focus Timer** — Pomodoro-style (25/15/50 min presets), animated ring, logs completed sessions to the database automatically
- **Tasks** — add/edit/delete, mark complete, priority, due dates, filter by status
- **Subjects** — add classes with instructor, room, color, credits, and a full weekly recurring schedule
- **Exams** — add/edit/delete exams with live "days left" countdown
- **Notes** — per-subject notes with quick view/edit
- **Resources** — links, books, videos, PDFs, organized by subject
- **Calendar** — full month view combining classes, exams and task due dates
- **Progress** — 8-week study trend chart, time-by-subject doughnut chart, task completion rate
- **Settings** — edit profile, change password
- **Auth** — secure login/register/logout with hashed passwords & PHP sessions

## Requirements
- PHP 8.0+ with PDO MySQL extension
- MySQL 5.7+ / MariaDB 10.3+
- Any local server stack: XAMPP, WAMP, MAMP, Laragon, or `php -S`

## Setup (XAMPP / WAMP / local PHP)

1. **Copy the project**
   Place the `study-dashboard` folder inside your server's web root
   (e.g. `C:\xampp\htdocs\study-dashboard` or `/var/www/html/study-dashboard`).

2. **Create the database**
   Open phpMyAdmin (or the MySQL CLI) and import:
   ```
   database/study_dashboard.sql
   ```
   This creates the `study_dashboard` database, all tables, and a demo account with sample data.

3. **Configure the database connection**
   Edit `config/db.php` if your MySQL credentials differ from the defaults:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'study_dashboard');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   ```

4. **Start your server** (Apache via XAMPP/WAMP, or quickly with PHP's built-in server):
   ```bash
   cd study-dashboard
   php -S localhost:8000
   ```

5. **Open the app**
   Visit `http://localhost/study-dashboard/` (or `http://localhost:8000/`).
   You'll land on the login page.

## Demo Login
```
Email:    student@example.com
Password: student123
```
Or click "Create one" to register your own account — every new account starts empty and ready for your own classes, tasks and exams.

## Project Structure
```
study-dashboard/
├── api/                 → PHP JSON endpoints (AJAX backend)
│   ├── dashboard.php    → aggregated stats for the home page
│   ├── tasks.php        → tasks CRUD
│   ├── subjects.php     → subjects + weekly schedule CRUD
│   ├── exams.php        → exams CRUD
│   ├── notes.php        → notes CRUD
│   ├── resources.php    → resources CRUD
│   ├── study_sessions.php → focus timer logging + progress analytics
│   └── calendar.php     → month view event aggregation
├── auth/                → login.php, register.php, logout.php
├── assets/
│   ├── css/style.css    → full dark-violet design system
│   └── js/              → one JS file per page (fetch-based, no page reloads)
├── config/db.php        → database connection (edit this)
├── database/
│   └── study_dashboard.sql → full schema + seed data (import this in MySQL)
├── includes/            → shared PHP partials (head, sidebar, topbar, auth guard)
├── index.php            → Dashboard
├── tasks.php / subjects.php / exams.php / notes.php / resources.php
├── calendar.php / progress.php / settings.php
```

## Notes
- All data is 100% dynamic — every number, list and chart on every page is pulled live from MySQL via the PHP API, nothing is hardcoded.
- Passwords are hashed with PHP's `password_hash()` (bcrypt).
- All API endpoints require an active login session and only return/modify the logged-in user's own data.
- The UI is fully responsive (mobile sidebar collapses behind a toggle button).
