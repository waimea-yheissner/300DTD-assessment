<?php

require 'lib/db.php';

consoleLog($_POST, 'Form data');

//get the data values from form
$user = $_POST['username'];
$court  = $_POST['court'];
$date = $_POST['date'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];


$db = connectToDB();

$query = 'SELECT * FROM bookings WHERE date = ? AND starttime=? AND endtime=?';
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$date, $starttime, $endtime]);
    $existingBooking = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch');
    die('There was an error getting data from the database');
}

if ($existingBooking == false) {
        // add the user account     
    $query = 'INSERT INTO bookings (username, court, date, starttime, endtime) VALUES (?, ?, ?, ?, ?) ' ;
    $stmt = $db->prepare($query);
    $stmt->execute([$user, $court, $date, $starttime, $endtime]);

    echo '<h3>Booking created!</h3>';
}
else {
    echo '<h3>This time is already booked</h3>';
}



echo '<p><a href="/bookings">Back</a>';