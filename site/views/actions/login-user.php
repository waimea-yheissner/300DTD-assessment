<!-- Handle the login data from the form, e.g. check against database -->

<?php

require 'lib/db.php';

consoleLog($_POST, 'Form Data');

$user = $_POST['user'];
$pass = $_POST['pass'];

$db = connectToDB();
// try to find user account with the given username     
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

consoleLog($userData, 'DB Data');


// did we actually get a user account?
if ($userData) {
    //yes we have an account, so check password
    if (password_verify($pass, $userData['hash'])) {
// we got here, so user and password both ok
        $_SESSION['user']['loggedIn'] = true;
        // save user info for later use
        $_SESSION['user']['username'] = $userData['username'];
        $_SESSION['user']['forename'] = $userData['forename'];
        $_SESSION['user']['surname'] = $userData['surname'];
        // Head over to the home page
        header('HX-Redirect: ' . SITE_BASE . '/');
    }
    else {
        echo '<h2>Incorrect password!</h2>';
    }
}
else {
    echo '<h2>User account does not exist!</h2>';
}

echo '<p><a href="/">Home</a>';


?>
