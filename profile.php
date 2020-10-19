<?php

require "header.php";

?>

<main>
    Ciao <?php echo $_SESSION['userUid']; ?>
    <p class="profile-text">In questa sezione potrai modificare o eliminare il tuo profilo.</p>
    <p class="edit-message"></p>
    <form action="conn/edit.con.php" method="post" class="reg" id="edit-form">
        <input type="hidden" name="id" id="id">
        <input type="text" name="uid" id="edit-uid" placeholder="Username">
        <input type="email" name="mail" id="edit-mail" placeholder="Email">
        <input type="password" name="pwd" id="edit-password" placeholder="New Password">
        <input type="password" name="pwd-repeat" id="signup-pwd-repeat" placeholder="Repeat password">
        <br>
        <button type="submit" name="edit-submit" id="edit-sub-button">Modifica</button>


    </form>
    <form action="conn/delete.con.php" method="post" id="delete-form">
        <input type="hidden" name="uid" id="delete-uid">
        <button type="submit" name="delete-submit" id="delete-sub-button"><i class="fas fa-trash-alt"></i></button></form>

</main>

<script>
    var loggedUser = "<?php echo ($_SESSION['userUid']); ?>";
    var loggedMail = "<?php echo ($_SESSION['userMail']); ?>";
    var loggedUser = "<?php echo ($_SESSION['userUid']); ?>";
    var loggedPwd = "<?php echo ($_SESSION['userPwd']); ?>";
    var loggedId = "<?php echo ($_SESSION['userId']); ?>";

    $("#edit-uid").val(loggedUser);
    $("#delete-uid").val(loggedUser);
    $("#edit-mail").val(loggedMail);
    $("#edit-password").val(loggedPwd);
    $("#id").val(loggedId);
</script>