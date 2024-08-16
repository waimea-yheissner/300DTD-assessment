<h1>Welcome</h1>

<!-- Main navigation menu. Can add logic for user type / access -->

<?php 
    global $loggedIn;    
    consoleLog($loggedIn);
?>

<nav id="main-nav">

    <menu hx-boost="true">
        <li><a href="/">Home</a>

        <?php if ($loggedIn): ?>
            
            <li><a href="/bookings">bookings</a>
            <li><a hx-post="/logout" href="/logout">Logout</a>
          

        <?php else: ?>

            <li><a href="/login">Login</a>
            <li><a href="/signup">Sign up</a>

        <?php endif ?>

    </menu>

</nav>




<h1>Notices</h1>

<h2>COVID-19: Notice to all hall users 02, Apr, 2022</h1>
<p>Following the government announcement of 23 March, 2022 the need for Richmond Badminton Hall users to have a vaccine pass will cease from 5 April.

There is now also no requirement to scan in or for a business or club to display a QR code poster or have mandatory record keeping.

Other face mask rules remain unchanged – face masks are still required in most indoor settings.

The traffic light status may change on 4 April, 2022 and we will update you if needed.
</p>

<h2>COVID-19: Badminton at Red 🔴04 Feb, 2022</h3>
<p>The stadium will remain open with some restrictions.

Always sign in upon arrival using the NZ Covid Tracer app or the paper register provided.

Have your vaccine pass verified once by your club controller.

Wear a face covering whenever you’re not exercising or playing badminton whilst in the stadium.

Wash and/or sanitise your hands often whilst in the stadium.

COVID-19: Badminton at Alert Level 418 Aug, 2021
</p>



<!-- Update the nav links -->
<script>configureNav();</script>