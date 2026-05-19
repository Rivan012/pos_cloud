# POS Cloud Laravel

Aplikasi Point of Sale (POS) berbasis Laravel untuk manajemen barang, kategori, diskon, kasir, dan transaksi penjualan.

## Fitur
- Manajemen Kategori Barang
- Manajemen Barang
- Manajemen Diskon
- Manajemen Kasir
- Manajemen Penjualan
---

## Tech Stack
- PHP 8.2.x
- Laravel 13
- MySQL / MariaDB
- Composer

---

## Clone Project
Clone repository:

```bash
git clone https://github.com/Rivan012/pos_cloud.git
```

Masuk ke folder project:

```bash
cd pos_cloud
```

---

## Install Dependency
Install package Laravel:

```bash
composer install
```

---

## Environment Setup
Copy file environment:

```bash
cp .env.example .env
```

Jika di Windows CMD:

```cmd
copy .env.example .env
```

Jika PowerShell:

```powershell
Copy-Item .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

## Database Configuration
Edit file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pos_cloud
DB_USERNAME=root
DB_PASSWORD=
```

Buat database MySQL:

```sql
CREATE DATABASE pos_cloud;
```

---

## Run Migration
Jalankan migration:

```bash
php artisan migrate
```

Jika ingin reset database:

```bash
php artisan migrate:fresh
```

Jika menggunakan seeder:

```bash
php artisan db:seed
```

Atau:

```bash
php artisan migrate:fresh --seed
```

---

## Run Project
Menjalankan server Laravel:

```bash
php artisan serve
```

Akses di browser:

```bash
http://127.0.0.1:8000
```

---

## Folder Structure
```bash
app/
 ├── Models/
 ├── Http/
 │    ├── Controllers/
database/
 ├── migrations/
 ├── seeders/
routes/
 ├── web.php
 ├── api.php
```

---

## Common Errors

### Foreign key constraint incorrectly formed
Jika muncul error seperti:

```bash
SQLSTATE[HY000]: General error: 1005
```

Biasanya karena nama tabel foreign key tidak sesuai.

Solusi:

```bash
php artisan migrate:fresh
```

Pastikan naming migration sesuai Laravel convention:

- users
- barangs
- diskons
- kasirs
- penjualans
- kategori_barangs

---

### Composer not found
Install Composer terlebih dahulu:

https://getcomposer.org/

---

### PHP version error
Cek versi PHP:

```bash
php -v
```

Minimal sesuai requirement Laravel.

---

## Author
Rivan Alfatoni

---

## License
Open-source for educational purposes.