<?php

require 'lib/db.php';   


// Date object for today
$dateToday = date_create('now');
// Date object offset by given offset number (from route)
$displayDate = date_add($dateToday, DateInterval::createFromDateString($offset . ' days'));
// Format for the SQL query
$displayDateText = date_format($displayDate, 'Y-m-d');



$db = connectToDB();

$query = 'SELECT * FROM bookings WHERE date = ?';
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$displayDateText]);
    $bookings = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}


echo '<h1>Bookings for ' . date_format($displayDate, 'd M Y') . '</h1>';

echo '<div class="button-list"> 
    <button
        hx-get="/bookings/'.($offset-1).'"
        hx-target="#bookings-list"
    >
        Prev day
    </button>

    <button
        hx-get="/bookings/'.($offset+1).'"
        hx-target="#bookings-list"
    >
        Next day 
    </button>

    <button
    hx-get="/bookings/'.($offset-7).'"
    hx-target="#bookings-list"
>
    Prev week
    </button>


    <button
    hx-get="/bookings/'.($offset+7).'"
    hx-target="#bookings-list"
>
    next week
    </button>

</div>
';

echo '<ul>';

foreach ($bookings as $booking) {

    $bookingDate = new DateTimeImmutable($booking['date']);
    $bookingDateText = $bookingDate->format('d M');

    $bookingStartTime = new DateTimeImmutable($booking['starttime']);
    $bookingStartTimeText = $bookingStartTime->format('g:ia');

    $bookingEndTime = new DateTimeImmutable($booking['endtime']);
    $bookingEndTimeText = $bookingEndTime->format('g:ia');


    echo '<li>';
    echo $booking['username'];

    echo ' court '.$booking['court_id'];

    echo ' '.$bookingDateText;

    echo '  '.$bookingStartTimeText;

    echo '  to   '.$bookingEndTimeText;
    echo '</li>';

}

echo '</ul>';
