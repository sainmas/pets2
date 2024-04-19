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
$f3->route('GET|POST /order', function($f3) {
    session_start();

    //Check if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pet = $_POST['petKind'];
        $petColor = $_POST['petColor'];
        //Validate the data
        if (empty($pet)) {
            //Data is invalid
            echo "Please supply a pet type";
        } else {
            //Data is valid
            $f3->set('SESSION.pet', $pet);
            $f3->set('SESSION.petColor', $petColor);
            //Redirect to the summary route
            $f3->reroute("summary");
        }
    }

   //Render view page
    $view = new Template();
    echo $view->render('views/pet-order.html');
});

$f3->route('GET|POST /summary', function() {
    session_start();
    /*$pet = $_SESSION['pet'];
    $petColor = $_SESSION['petColor'];
    echo '<title>Order Pet</title>';
    echo '<h1>Results</h1>';
    echo "Thank you for ordering a $petColor $pet!";*/

    //Render view page
    $view = new Template();
    echo $view->render('views/results.html');
});

// Run Fat-Free
$f3->run();