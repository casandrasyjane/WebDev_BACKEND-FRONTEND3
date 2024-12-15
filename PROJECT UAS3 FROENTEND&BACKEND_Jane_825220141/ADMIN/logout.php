<?php
 session_start();
 $_SESSION["useremail"];
 unset($_SESSION["useremail"]);

 session_unset();

 session_destroy();
 header("location:login.php");

?>