
<?php
// Autoloader sederhana
spl_autoload_register(function ($class) {
     $file = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';
     if (file_exists($file)) {
          require $file;
     }
});

require_once __DIR__ . '/../app/Helpers.php';
include_once __DIR__ . '/../config/database.php';
$routes = include __DIR__ . '/../routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = dirname(dirname($_SERVER['SCRIPT_NAME']));
if ($base !== '/' && strpos($uri, $base) === 0) {
     $uri = substr($uri, strlen($base));
}
if ($uri === '' || $uri === false) $uri = '/';

$method = $_SERVER['REQUEST_METHOD'];

// Routing mirip Laravel: dukung GET/POST dan parameter
$found = false;
foreach ($routes as $route => $action) {
     $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);
     $pattern = "#^" . $pattern . "$#";
     if (preg_match($pattern, $uri, $matches)) {
          array_shift($matches);
          list($controller, $func) = $action;
          if (class_exists($controller)) {
               $obj = new $controller();
               if (method_exists($obj, $func)) {
                    call_user_func_array([$obj, $func], $matches);
                    $found = true;
                    break;
               }
          }
     }
}
if (!$found) {
     http_response_code(404);
     echo "404 Not Found";
}
?>
