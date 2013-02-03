<?php 
define('ROOT', '../');
define('APP', ROOT . 'app/');

require ROOT . 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$map = array(
    '/hello' => APP.'hello.php',
    '/bye' => APP.'bye.php',
);

$path = $request->getPathInfo();
if (isset($map[$path])){
    ob_start();
    extract($request->query->all(), EXTR_SKIP);
    include $map[$path];
    $response = new Response(ob_end_clean());
    // $response = new Response();
}else{
    $response = new Response('Not Found', 404);
}

$response->send();