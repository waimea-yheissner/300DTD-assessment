<?php global $loggedIn; ?>
<?php global $username; ?>
    

<?php if (!$loggedIn): ?>

    <h1>Forbidden</h1>

    <p>You are not authorised to see this information</p>

<?php else: ?>

    <?php
// if (isset($_GET['next_day'])) {
//     $current_date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
//     $next_date = date('Y-m-d', strtotime($current_date . ' +1 day'));
//     header("Location: ?date=$next_date");
//     exit();
// }
?>

<div 
    hx-get="/bookings/0" 
    id="bookings-list"
    hx-trigger="load"
>

</div>
    
    <button hx-get="/booking-form" hx-swap="outerHTML">
                Create booking
            </button>

    



    <a id= 'backbutton' href="/">back</a>


<?php endif ?>
