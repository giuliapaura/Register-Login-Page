<?php

if (isset($_POST['postsubmit'])) {


    require 'dbh.con.php';

    //prendere le informazioni dal form
    $username = $_POST['postusername'];
    $email = $_POST['postmail'];
    $password = $_POST['postpassword'];
    $passwordRepeat = $_POST['postrepeat'];




    //GESTIONE ERRORI:
    //1. L'utente ha lasciato uno o più campi vuoti
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        echo "Riempi tutti i campi!";

        exit();
    }
    //2. L'utente ha inserito un username non valido e mail non valida
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {

        echo "Username o Email non validi!";
        exit();
    }
    //3. L'utente ha inserito una mail non valida
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        echo "Email non valida!";
        exit();
    }
    //4. L'utente ha inserito un username non valido
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

        echo "Username non valido!";
        exit();
    }
    //5. L'utente ha inserito due password diverse
    else if ($passwordRepeat !== $passwordRepeat) {

        echo "Le password non corrispondono";
        exit();
    }
    //6. L'utente ha inserito un username già presente nel database
    else {

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

            if ($resultCheck > 0) {
                echo "Ops, pare che questo username sia già stato preso.";
                exit();
            } else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "Errore di connessione!";
                    exit();
                } else {

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);

                    echo '<span class="success">Registrazione avvenuta con successo!<br> Effettua il LOGIN per accedere a contenuti meravigliosi.</span>';
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit();
}
