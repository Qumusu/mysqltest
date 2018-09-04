<?php

session_start();

//$_SESSION['username'] = "robpercival";

if($_SESSION['email']){
    echo "あなたはログインしています。";
} else {
    header("Location: index2.php");
}

//echo $_SESSION['username'];

?>