<?php
namespace App\Controllers;

class HomeController {
    public function index() {
        echo "<h1>Welcome to PHP Native Starter Pack!</h1>";
    }

    public function about() {
        echo "<h1>About Page</h1><p>Ini adalah halaman about.</p>";
    }
}
