<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';

// Site Configuration
const SITE_NAME  = 'Nelson badminton';
const SITE_OWNER = 'Waimea College';

// Setup browser session
session_name('yheissnerBookings');
session_start();

//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);

//-------------------------------------------------------------
// see if logged in
$loggedIn = $_SESSION['user']['loggedIn'] ?? false;

consoleLog($_SESSION);

//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/', 'pages/home.php');
$router->route(GET, PAGE, '/about', 'pages/about.php');


$router->route(GET, PAGE, '/bookings', 'pages/bookings.php');
$router->route(GET, HTMX, '/bookings/$offset', 'components/bookings.php');
$router->route(GET,  HTMX, '/booking-form',   'components/form-booking.php');
$router->route(POST, HTMX, '/create-booking', 'actions/create-booking.php');




$router->route(GET, PAGE, '/login', 'pages/login.php');
$router->route(GET, PAGE, '/signup', 'pages/signup.php');
$router->route(POST,   HTMX, '/login',     'actions/login-user.php');
$router->route(POST,   HTMX, '/logout',    'actions/logout-user.php');
$router->route(POST,   HTMX, '/signup', 'actions/signup-user.php');



//-------------------------------------------------------------
// Generate the required view

$router->view();



