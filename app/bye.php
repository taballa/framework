<?php
// app/bye.php
 
require '_init.php';

$response->setContent('Goodbye!');

$response->send();