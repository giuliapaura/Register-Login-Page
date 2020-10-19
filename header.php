<?php
session_start(); // per essere sicuri di avere una sessione in ogni pagina
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b30e54b97e.js" crossorigin="anonymous"></script>
    <!--google font: Roboto Mono-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <title>Log in page</title>
</head>


<body>
    <header>
        <nav>
            <a href="#"><i class="fas fa-user-astronaut"></i></a>
            <a href="index.php">Home</a>
            <?php
            if (isset($_SESSION['userId'])) {
                echo '<a href="profile.php">Profilo</a>';
            }
            ?>



            <!--form di login-->
            <div class="form">
                <span class="login-message">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<i class="fas fa-exclamation-circle"></i> Riempi tutti i campi';
                        } else if ($_GET['error'] == "wrongpwd") {
                            echo '<i class="fas fa-exclamation-circle"></i> Password errata';
                        } else if ($_GET['error'] == "nouser") {
                            echo '<i class="fas fa-exclamation-circle"></i> Utente inesistente';
                        }
                    }
                    ?>
                </span>
                <?php
                if (isset($_SESSION['userId'])) {
                    echo '<form action="conn/logout.con.php" method="post" id="login-form">
                            <button type="submit" name="logout-submit">Logout</button>
                        </form>';
                } else {
                    echo '<form action="conn/login.con.php" method="post">
                    
                    <input type="text" name="mailuid" placeholder="Username o Email" id="login-mailuid">
                    <input type="password" name="pwd" placeholder="Password" id="login-pwd">
                    <button type="submit" name="login-submit" id="login-sub-button">Login</button>
                    
                </form>

                <a href="signup.php">Sign Up!</a>';
                }
                ?>

            </div>



        </nav>
    </header>

</body>

</html>