<?php 
// /front.php

require 'app/_init.php';

$map = array(
    '/hello' => __DIR__.'/app/hello.php',
    '/bye' => __DIR__.'/app/bye.php',
);

$path = $request->getPathInfo();
if (isset($map[$path])){
    require $map[$path];
}else{
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();