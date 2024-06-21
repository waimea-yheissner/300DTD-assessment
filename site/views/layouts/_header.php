<!-- Header typically has the site name which links to home page -->

<header id="main-header">
    
    <a href="/"><?= SITE_NAME ?></a>



    <?php 
        global $loggedIn;  

        if ($loggedIn) {
            $name = $_SESSION['user']['forename'] . ' ' . $_SESSION['user']['surname'];
            echo '<p>Welcome, ' . $name . '</p>';
        }
        else {
            echo '<p>Welcome, Guest';
        }
    ?>


    <?php require '_nav.php'; ?>

</header>

