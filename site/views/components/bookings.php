<?php global $username; ?>


<?php

require 'lib/db.php';   


// Date object for today
$dateToday = date_create('now');
// Date object offset by given offset number (from route)
$displayDate = date_add($dateToday, DateInterval::createFromDateString($offset . ' days'));
// Format for the SQL query
$displayDateText = date_format($displayDate, 'Y-m-d');

echo '<h1>Bookings ' . date_format($displayDate, 'd M Y') . '</h1>';

echo '<div class="button-list"> 
    <button
        hx-get="/bookings/'.($offset-7).'"
        hx-target="#bookings-list"
    >
        &lt;&lt;
    </button>

    <button
        hx-get="/bookings/'.($offset-1).'"
        hx-target="#bookings-list"
    >
        &lt;
    </button>

    <button
        hx-get="/bookings/'.($offset+1).'"
        hx-target="#bookings-list"
    >
        &gt;
    </button>


    <button
        hx-get="/bookings/'.($offset+7).'"
        hx-target="#bookings-list"
    >
        &gt;&gt;
    </button>

</div>
';



$db = connectToDB();

$query = 'SELECT DISTINCT court FROM bookings ORDER BY court ASC';
try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $courts = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleError($e->getMessage(), 'DB List Fetch');
    die('There was an error getting court data from the database');
}

$query = 'SELECT bookings.date,
                 bookings.starttime,
                 bookings.endtime,
                 users.username,
                 users.forename,
                 users.surname 
            FROM bookings
            JOIN users ON bookings.username = users.username 
            WHERE bookings.date = ? AND bookings.court = ?
            ORDER BY bookings.starttime';

foreach($courts as $court) {
    $courtNum = $court['court'];

    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$displayDateText, $courtNum]);
        $bookings = $stmt->fetchAll();
    }
    catch (PDOException $e) {
        consoleError($e->getMessage(), 'DB List Fetch');
        die('There was an error getting booking data from the database');
    }
    
    echo '<article>';

    echo '<h3>Court ' . $courtNum . '</h3>';

    echo '<ul>';
    
    foreach ($bookings as $booking) {
    
        $bookingDate = new DateTimeImmutable($booking['date']);
        $bookingDateText = $bookingDate->format('d M');
    
        $bookingStartTime = new DateTimeImmutable($booking['starttime']);
        $bookingStartTimeText = $bookingStartTime->format('g:ia');
    
        $bookingEndTime = new DateTimeImmutable($booking['endtime']);
        $bookingEndTimeText = $bookingEndTime->format('g:ia');
    
    
        echo '<li>';
    
        echo '<strong>' . $booking['forename'] . ' ' . $booking['surname'] . '</strong>';
    
        echo ' (' . $booking['username'] . ')';
    
        echo '<br>'.$bookingDateText;
    
        echo '  '.$bookingStartTimeText;
    
        echo '  to   '.$bookingEndTimeText;
        echo '</li>';
    
    }
    
    echo '</ul>';

    echo '</article>';
}

