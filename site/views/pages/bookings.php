<?php global $isLoggedIn; ?>
    

<?php if ($isLoggedIn): ?>

    <h1>Forbidden</h1>

    <p>You are not authorised to see this information</p>

<?php else: ?>

    <h1>Today's bookings</h1>


    <button hx-get="/booking-form" hx-swap="outerHTML">
                <strong>C</strong>reate booking
            </button>

    
    <button>
        Previous day
    </button>
    
    <button>
        Next day 
    </button>

    
<?php 

require 'lib/db.php';   

$db = connectToDB();

$query = 'SELECT * FROM bookings WHERE date = ?';
try {
    $stmt = $db->prepare($query);
    $stmt->execute([date('Y-m-d')]);
    $bookings = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}


foreach ($bookings as $booking) {

    $bookingDate = new DateTimeImmutable($booking['date']);
    $bookingDateText = $bookingDate->format('d M Y');

    $bookingTime = new DateTimeImmutable($booking['time']);
    $bookingTimeText = $bookingTime->format('g:ia');


    echo '<li>';
    echo $booking['username'];

    echo ' '.$booking['court_id'];

    echo ' '.$bookingDateText;

    echo '  '.$bookingTimeText;
    echo '</li>';

}
?>
    

<?php endif ?>
