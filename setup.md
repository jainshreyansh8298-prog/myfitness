# Project Setup & Database Guide

This document provides complete details on the local database setup, environment configuration, database credentials, and steps to run the **My Fitness** application.

---

## 1. Local Database Setup Summary

The application is configured to use a local **SQLite** database, which provides a fast, zero-configuration local development setup without requiring background database server processes.

* **Database Type:** SQLite 3
* **Database File Path:** `database/database.sqlite` (Absolute: `c:\Users\admin\Desktop\myfitness\database\database.sqlite`)
* **Environment File:** `.env`

---

## 2. Environment Configuration (`.env`)

The `.env` file has been updated with the following database credentials:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_USERNAME=root
# DB_PASSWORD=
```

---

## 3. Required PHP Extensions Enabled

The `C:\tools\php83\php.ini` configuration was updated to enable essential PHP extensions required by Laravel and the application:

* `mbstring` (Multibyte String handling)
* `pdo_sqlite` & `sqlite3` (SQLite Database Drivers)
* `pdo_mysql` & `mysqli` (MySQL/MariaDB Database Drivers)
* `curl` & `gd` (HTTP Client & Image Processing)
* `fileinfo`, `openssl`, `zip`

---

## 4. Database Migrations & Initial Seed Data

All 18 migrations were executed, creating 24 database tables (`users`, `roles`, `permissions`, `categories`, `services`, `areas`, `area_services`, `blogs`, `orders`, `user_details`, etc.).

The database was seeded with default initial data and the primary **Super Admin** account.

### Super Admin Credentials

| Field | Value |
| :--- | :--- |
| **Name** | Super Admin |
| **Email** | `admin@myfitness.ae` |
| **Password** | `12345678` |
| **Role** | `admin` |

---

## 5. How to Run the Application Locally

### Step 1: Start Laravel Development Server
Run the following command in your terminal:
```bash
php artisan serve
```
The application will be accessible at: `http://127.0.0.1:8000`

### Step 2: Start Vite Asset Compiler
In a separate terminal window, run:
```bash
npm run dev
```

### Step 3: (Optional) Run Database Migrations or Reset
If you ever need to reset and re-seed the database from scratch:
```bash
php artisan migrate:fresh --seed
```

---

## 6. (Optional) Switching to MySQL / MariaDB

If you wish to switch to local MySQL/MariaDB in the future:
1. Update `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=myfitness
   DB_USERNAME=root
   DB_PASSWORD=your_mysql_password
   ```
2. Create the database in MySQL:
   ```sql
   CREATE DATABASE myfitness;
   ```
3. Run migrations and seeders:
   ```bash
   php artisan migrate:fresh --seed
   ```
