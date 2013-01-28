<?php
<<<<<<< HEAD
// framework/app/index.php
include_once '../vendor/autoload.php';

$input = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-type: text/html; charset=utf-8');
 
printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));




=======
 
$input = $_GET['name'];
 
printf('Hello %s', $_GET['name']);
>>>>>>> 18d966bc2ca224f974ed62f946fcd9b23ab3ffcb
