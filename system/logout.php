<?php 
  session_start();

  if(count($_SESSION) > 0) {
    session_destroy();
  }
  header('Location: ../index.php');
?>