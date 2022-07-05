<?php
require 'vendor/autoload.php';
require 'framework/bootstrap.php';

$router = new Router();

require 'routes.php';

return $router->direct(Request::uri(), Request::type());