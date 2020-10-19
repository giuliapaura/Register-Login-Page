<?php

require "header.php";

?>

<main>
    <div class="signup-container">
        <h2>Sign Up</h2>

        <!-- MESSAGGI D?ERRORE-->

        <p class="form-message"></p>
        <!--/ MESSAGGI D?ERRORE-->

        <form action="conn/signup.con.php" method="post" class="reg" id="signup-form">
            <input type="text" name="uid" id="signup-uid" placeholder="Username">
            <input type="email" name="mail" id="signup-mail" placeholder="Email">
            <input type="password" name="pwd" id="signup-password" placeholder="Password">
            <input type="password" name="pwd-repeat" id="signup-pwd-repeat" placeholder="Repeat password">

            <button type="submit" name="signup-submit" id="signup-sub-button">Signup</button>
        </form>
    </div>

</main>