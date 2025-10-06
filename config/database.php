<?php
// Load .env file
function loadEnv(
     $path = __DIR__ . '/../.env'
) {
     if (!file_exists($path)) return;
     $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
     foreach ($lines as $line) {
          if (strpos(trim($line), '#') === 0) continue;
          list($name, $value) = array_map('trim', explode('=', $line, 2));
          $_ENV[$name] = $value;
     }
}

loadEnv();

$host = $_ENV['DB_HOST'] ?? 'localhost';
$user = $_ENV['DB_USER'] ?? 'root';
$pass = $_ENV['DB_PASS'] ?? '';
$db   = $_ENV['DB_NAME'] ?? '';


// pakai ini jika ingin native tanpa env bosQ
// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $db   = '';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
     die("Koneksi gagal: " . mysqli_connect_error());
}
?>
