<?php global $isLoggedIn; ?>
    

<?php if ($isLoggedIn): ?>

    <h1>Forbidden</h1>

    <p>You are not authorised to see this information</p>

<?php else: ?>

    <h1>Todays bookings</h1>

<?php endif ?>
