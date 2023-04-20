<?php 

session_start();
session_unset();
session_status();

echo '<script>';
 echo 'alert("Logout Succesfully");';
 echo 'window.location.href="home.php"';
echo '</script>';
?>