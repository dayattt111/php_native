
<?php
// Autoloader sederhana
spl_autoload_register(function ($class) {
     $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
     if (file_exists($file)) {
          require $file;
     }
});

include_once __DIR__ . '/../config/database.php';
$routes = include __DIR__ . '/../routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = dirname(dirname($_SERVER['SCRIPT_NAME']));
if ($base !== '/' && strpos($uri, $base) === 0) {
     $uri = substr($uri, strlen($base));
}
if ($uri === '' || $uri === false) $uri = '/';

if (isset($routes[$uri])) {
     list($controller, $method) = $routes[$uri];
     if (class_exists($controller)) {
          $obj = new $controller();
          if (method_exists($obj, $method)) {
               $obj->$method();
               exit;
          }
     }
     http_response_code(500);
     echo "Controller atau method tidak ditemukan.";
} else {
     http_response_code(404);
     echo "404 Not Found";
}
?>
