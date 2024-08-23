<?php

require 'lib/db.php';

consoleLog($_POST, 'Form data');

//get the data values from form
$fore = $_POST['forename'];
$sur  = $_POST['surname'];
$user = $_POST['user'];
$pass = $_POST['pass'];

// hash the supplied password
$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed password');

//connect
$db = connectToDB();
// add the user account     
$query = 'INSERT INTO users (forename, surname, username, hash) VALUES (?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$fore, $sur, $user, $hash]);

echo '<h2>Account created!</h2>';

// echo '<p><a href="/">Home</a>';