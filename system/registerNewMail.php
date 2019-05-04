<?php
  session_start();
  
  if(!isset($_POST['email'])) {
    header('Location: ../dashboard.php');
  }

  require "config.php";
  require "database.php";

  $register = DBRead('mails2sent', "WHERE email = '{$_POST['email']}'");

  if(!$register) {
    $tocount = DBRead('mails2sent');

    $insert = [
                'id' => count($tocount) + 1,
                'email' => $_POST['email'],
                'register_for' => $_SESSION['email']
              ];
    DBCreate('mails2sent', $insert);
    header('Location: ../dashboard.php?success=register');
  } else {
    header('Location: ../dashboard.php?exist=register');
  }
?>