# PHP Native Starter Pack

Starter pack sederhana untuk membangun aplikasi PHP Native modern dengan pola MVC, routing dinamis, dan koneksi MySQL.

## Fitur

- Struktur folder MVC (`app/Controllers`, `app/Models`, `app/Views`)
- Routing dinamis mirip Laravel (mendukung parameter)
- Helper `view()` untuk render tampilan
- Model sederhana untuk akses database
- Seeder untuk data awal
- Koneksi database MySQL menggunakan `.env`

## Struktur Folder

```
project/
│
├── app/
│   ├── Controllers/
│   │   └── HomeController.php
│   ├── Models/
│   │   └── User.php
│   ├── Views/
│   │   ├── home.php
│   │   ├── about.php
│   │   └── hello.php
│   └── Helpers.php
├── config/
│   └── database.php
├── database/
│   └── seeder_users.php
├── public/
│   └── index.php
├── routes.php
├── .env.example
├── README.md
```

## Instalasi

1. **Clone repositori**
    ```bash
    git clone https://github.com/username/php_native_starter.git
    ```

2. **Konfigurasi Database**
    - Copy file `.env.example` menjadi `.env`:
      ```bash
      cp .env.example .env
      ```
    - Edit file `.env` sesuai dengan kredensial MySQL Anda:
      ```env
      DB_HOST=localhost
      DB_USER=root
      DB_PASS=
      DB_NAME=nama_database
      ```

3. **Jalankan Seeder (opsional)**
    - Untuk membuat tabel dan data awal users:
      ```bash
      php database/seeder_users.php
      ```

4. **Jalankan Aplikasi**
    - Akses `public/index.php` melalui browser atau gunakan web server lokal (misal: XAMPP, Laragon, atau built-in PHP server):
      ```bash
      php -S localhost:8000 -t public
      ```
    - Buka `http://localhost:8000` di browser.

## Contoh Query

## Contoh Routing

Tambahkan rute di `routes.php`:

```php
return [
  '/' => ['App\\Controllers\\HomeController', 'index'],
  '/about' => ['App\\Controllers\\HomeController', 'about'],
  '/hello/{name}' => ['App\\Controllers\\HomeController', 'hello'],
];
```

## Contoh Controller

```php
namespace App\Controllers;

class HomeController {
  public function index() {
    view('home');
  }
  public function about() {
    view('about');
  }
  public function hello($name) {
    view('hello', ['name' => $name]);
  }
}
```

## Contoh Model

```php
namespace App\Models;

class User {
  protected $conn;
  public function __construct($conn) {
    $this->conn = $conn;
  }
  public function all() {
    $result = mysqli_query($this->conn, "SELECT * FROM users");
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $users[] = $row;
    }
    return $users;
  }
}
```

## Contoh View

```php
<h1>Hello, <?= htmlspecialchars($name ?? 'Guest', ENT_QUOTES, 'UTF-8') ?>!</h1>
```

## Lisensi

Proyek ini menggunakan lisensi MIT.