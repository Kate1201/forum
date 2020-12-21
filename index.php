<?php
session_start();
class Router
{
    private $routes;
    function add($route, callable $closure) {
            $this->routes[$route] = $closure;
    }

    function execute() {
        $path = $_SERVER['PATH_INFO'];
        if(array_key_exists($path, $this->routes)) {
            $this->routes[$path]();
        } else {
            $this->routes['/404']();
        }
    }
}

$router = new Router();

$router->add('/', function () {
    include 'views/templates/index.tpl.php';
});
$router->add('/index', function () {
    include 'views/templates/index.tpl.php';
});
$router->add('/theme/', function () {
    include 'views/templates/theme.tpl.php';
});
$router->add('/theme/question/', function () {
    include 'views/templates/question.tpl.php';
});
$router->add('/new-theme/', function () {
    include 'views/templates/new-theme.tpl.php';
});
$router->add('/theme/new-question/', function () {
    include 'views/templates/new-question.tpl.php';
});


$router->add('/register', function () {
    include 'views/templates/user/registration.tpl.php';
});
$router->add('/login', function () {
    include 'views/templates/user/login.tpl.php';
});
$router->add('/logout', function () {
    include 'controllers/user/logout.ctrl.php';
});


$router->add('/404', function () {
    echo  $_SERVER['PATH_INFO'];
});
$router->execute();
