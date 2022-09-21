<?php
//ini_set('display_errors', 0);
require 'core/Resources.php';
//New init from class Router in core.
$router = new Router();
require 'routes.php';
require $router->direct(Request::uri());
