<?php

if (isset($_POST['editsubmit'])) {


    require 'dbh.con.php';


    $username = $_POST['editusername'];
    $email = $_POST['editmail'];
    $password = $_POST['editpassword'];
    $passwordRepeat = $_POST['editrepeat'];
    $id = $_POST['uId'];



    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";

    //prepared statement:
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Errore di connessione al database!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);


        $sql = "UPDATE users SET uidUsers = ?, emailUsers=?, pwdUsers=? WHERE idUsers = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Errore di connessione!";
            exit();
        } else {

            $editPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedPwd, $id);
            mysqli_stmt_execute($stmt);

            echo '<span class="success">Modifica avvenuta con successo!<br> Effettua il LOGIN per accedere a contenuti meravigliosi.</span>';
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo 'errore';
    exit();
}
