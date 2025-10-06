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
    - Edit file `config/database.php` sesuai dengan kredensial MySQL Anda.

    ```php
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'nama_database';

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
         die("Koneksi gagal: " . mysqli_connect_error());
    }
    ?>
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