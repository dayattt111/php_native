# PHP Native Starter Pack

Starter pack sederhana untuk membangun aplikasi PHP Native dengan koneksi MySQL.

## Fitur

- Struktur folder sederhana
- Koneksi database MySQL menggunakan `mysqli`
- Contoh file konfigurasi dan query dasar

## Struktur Folder

```
project/
│
├── config/
│   └── database.php
├── public/
│   └── index.php
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

3. **Jalankan Aplikasi**
    - Akses `public/index.php` melalui browser.

## Contoh Query

```php
<?php
include '../config/database.php';

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
     echo $row['username'] . "<br>";
}
?>
```

## Lisensi

Proyek ini menggunakan lisensi MIT.