<?php
// framework/app/index.php
include_once '../vendor/autoload.php';

$input = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-type: text/html; charset=utf-8');
 
printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));

