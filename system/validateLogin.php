<?php
  if(!isset($_POST['mail']) || !isset($_POST['password'])) {
    header('Location: ../index.php');
  }

  require "config.php";
  require "database.php";

  $register = DBRead('registerUsers', "WHERE email = '{$_POST['mail']}'");
  $login = $register[0];

  session_start();

  if($register && $_POST['password'] == $login['password']) {
    foreach($login as $k => $val) {
      if($k != 'register_date' && $k != 'password') {
        $_SESSION[$k] = $val;
      }
    }
    $_SESSION['sessionID'] = sessionID();
    header('Location: ../dashboard.php');
  } else {
    header('Location: ../form.php?login=true&exist=register');
  }

  function sessionID() {
    return rand(100000, 999999);
  }
?>