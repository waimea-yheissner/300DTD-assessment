<?php global $isLoggedIn; ?>
    

<?php if ($isLoggedIn): ?>

    <h1>Forbidden</h1>

    <p>You are not authorised to see this information</p>

<?php else: ?>

    <h1>Todays bookings</h1>


    <button hx-get="/booking-form" hx-swap="outerHTML">
                <strong>C</strong>reate booking
            </button>

<?php 

require 'lib/db.php';

$db = connectToDB();

$query = 'SELECT * FROM bookings';
try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $bookings = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}

foreach ($bookings as $booking) {

    echo '<li>';
    echo $booking['username'];

    echo $booking['court_id'];

    echo $booking['date'];

    echo $booking['time'];
    echo '</li>';

}
?>
    

<?php endif ?>
