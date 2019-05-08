<?php
  session_start();
  if(!isset($_POST['email'])) {
    if(isset($_GET['form']) && $_GET['form'] == 'call') {
      header('Location: ../form_list.php');
    } else {
      header('Location: ../dashboard.php');
    }
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
    if(isset($_GET['form']) && $_GET['form'] == 'call') {
      header('Location: ../form_list.php?success=register');
    } else {
      header('Location: ../dashboard.php?success=register');
    }
  } else {
    if(isset($_GET['form']) && $_GET['form'] == 'call') {
      header('Location: ../form_list.php?exist=register');
    } else {
      header('Location: ../dashboard.php?exist=register');
    }
  }
?>