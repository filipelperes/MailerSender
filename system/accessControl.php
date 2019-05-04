<?php 
  session_start();

  if(!isset($_SESSION['sessionID']) || count($_SESSION) == 0) {
    header('Location: index.php');
  }
?>