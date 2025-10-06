<?php
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

    public function find($id) {
        $stmt = mysqli_prepare($this->conn, "SELECT * FROM users WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }
}
