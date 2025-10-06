<?php
namespace App\Controllers;

class HomeController {
    public function index() {
        // Render view home.php
        \view('home');
    }

    public function about() {
        \view('about');
    }

    public function hello($name) {
        \view('hello', ['name' => $name]);
    }
}
