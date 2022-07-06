<?php
require 'vendor/autoload.php';
require 'framework/bootstrap.php';

use App\Framework\{Router, Request};

$router = new Router();

require 'routes.php';

return $router->direct(Request::uri(), Request::type());