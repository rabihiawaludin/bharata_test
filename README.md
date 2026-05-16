# Stock Dashboard App

A simple full stack stock management dashboard built with Laravel.

## Features

- Login admin & operator
- CRUD barang
- CRUD user operator
- CRUD transaksi barang masuk & keluar
- Realtime stock update using Laravel Reverb (WebSocket)
- Stock warning when stock < 10
- Concurrency-safe stock transaction using DB transaction & row locking
- k6 load testing
- Docker version

---

# Tech Stack

- Laravel 13
- MySQL
- Laravel Breeze
- Laravel Reverb
- Tailwind CSS
- Docker
- Grafana k6

---

# Concurrency Handling

To prevent race conditions during concurrent stock updates:

```php
DB::transaction()
lockForUpdate()
```

This ensures stock remains accurate even when multiple users update stock simultaneously.

---

# Installation

## Clone project

```bash
git clone https://github.com/rabihiawaludin/bharata_test
```

## Install dependency

```bash
composer install
npm install
```

## Environment

```bash
cp .env.example .env
```

Configure database.

---

# Run Application

```bash
php artisan serve
npm run dev
php artisan reverb:start
```

---

# Run Migration

```bash
php artisan migrate
```

---

# Docker

```bash
docker compose up -d
```

---

# Realtime WebSocket

Using Laravel Reverb.

Run websocket server:

```bash
php artisan reverb:start
```

---

# k6 Load Test

Run:

```bash
k6 run k6-test.js
```

Example:
- 20 VUs
- 100 concurrent transaction requests

Stock consistency remains accurate because transactions are protected using database row locking.

---

# Demo Account

## Admin

```txt
username: admin
password: password
```

## Operator

```txt
username: operator
password: password
```

---

# Deployment

Coming soon