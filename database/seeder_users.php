<?php
// Seeder sederhana untuk tabel users
include __DIR__ . '/../config/database.php';

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
)";

mysqli_query($conn, $sql);

$users = [
    ['username' => 'admin', 'email' => 'admin@example.com'],
    ['username' => 'user1', 'email' => 'user1@example.com'],
    ['username' => 'user2', 'email' => 'user2@example.com'],
];

foreach ($users as $user) {
    $username = $user['username'];
    $email = $user['email'];
    mysqli_query($conn, "INSERT INTO users (username, email) VALUES ('$username', '$email')");
}

echo "Seeder selesai. Data users sudah ditambahkan.\n";
