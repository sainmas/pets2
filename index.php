<?php

// 328/pets2/index.php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require autoload.php
require_once ('vendor/autoload.php');

// Instantiate the F3 base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function() {
    //echo '<h1>Pet Home</h1>';

    // Render a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define order pet route
$f3->route('GET /order', function() {
   //echo '<h1>Order Pet</h1>';

   //Render view page
    $view = new Template();
    echo $view->render('views/pet-order.html');
});

// Run Fat-Free
$f3->run();