<?php

$router = new Phalcon\Mvc\Router(false);
$router->removeExtraSlashes(true);


$router->add('/admin/:controller/:action/:params', [
    'namespace' => 'Admin',
    'controller' => 1,
    'action' => 2,
    'params' => 3,
]);

$router->add('/admin/:controller', [
    'namespace' => 'Admin',
    'controller' => 1
]);

$router->add('/admin', [
    'namespace' => 'Admin',
    'controller' => 'admin'
]);

return $router;