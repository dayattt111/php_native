<?php
// routes.php

return [
    '/' => ['App\\Controllers\\HomeController', 'index'],
    '/about' => ['App\\Controllers\\HomeController', 'about'],
    '/hello/{name}' => ['App\\Controllers\\HomeController', 'hello'],
];
