<?php

require 'lib/db.php';

consoleLog($_POST, 'Form data');

//get the data values from form
$user = $_POST['username'];
$court  = $_POST['court_id'];
$date = $_POST['date'];
$time = $_POST['time'];

$db = connectToDB();
// add the user account     
$query = 'INSERT INTO bookings (username, court_id, date, time) VALUES (?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$user, $court, $date, $time]);

echo '<h2>Booking created!</h2>';

echo '<p><a href="/">Home</a>';