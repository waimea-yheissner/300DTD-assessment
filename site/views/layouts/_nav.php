<!-- Main navigation menu. Can add logic for user type / access -->

<?php 
    global $loggedIn;    
    consoleLog($loggedIn);
?>

<nav id="main-nav">

    <menu hx-boost="true">
        <li><a href="/">Home</a>
        <li><a href="/about">About</a>
        <li><a href="/signup">Sign up</a>

        <?php if ($loggedIn): ?>

            <li><a hx-post="/logout" href="/logout">Logout</a>

        <?php else: ?>

            <li><a href="/login">Login</a>

        <?php endif ?>

    </menu>

</nav>


<!-- Update the nav links -->
<script>configureNav();</script>