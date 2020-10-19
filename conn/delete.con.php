<?php

if (isset($_POST['deletesubmit'])) {


    require 'dbh.con.php';


    $user = $_POST['userdelete'];



    $sql = "DELETE FROM users WHERE idUsers = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Errore di connessione!";
        exit();
    } else {

        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);

        echo '<span class="success">Modifica avvenuta con successo!</span>' + $user;
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo 'errore';
    exit();
}
