<?php

require "header.php";

?>

<main>
    <?php
    if (isset($_SESSION['userId'])) {
        echo '<iframe width="1229" height="691" src="https://www.youtube.com/embed/R5eGesEen5A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="1229" height="691" src="https://www.youtube.com/embed/Y-rObexrD_4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="1229" height="691" src="https://www.youtube.com/embed/mkBiGCMJW2E" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    } else {
        echo '<p>Accedi o Registrati per avere accesso a contenuti strabilianti!</p>';
    }
    ?>

</main>