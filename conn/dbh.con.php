<?php

$servername = "localhost";
$dBUsername = "utente";
$dBPassword = "passutente";
$dBName = "esame_login";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}
