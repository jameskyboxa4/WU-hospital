<?php
session_start();
if(empty($_SESSION['user_id'])){
   header('location: signin.php');    
} else {
   echo 'Secure page!.';
   echo '<a href="/logout.php">logout';
}