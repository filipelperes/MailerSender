<?php 
  if(!isset($_POST['mail']) || !isset($_POST['password'])) {
    header('Location: ../index.php');
  }

  require "config.php";
  require "database.php";

  $value = DBRead("registerUsers", "WHERE email = '{$_POST['mail']}'");

  //Se não existir o registro, então registre
  if(!$value) {
    $id = DBRead("registerUsers");
    $insert = [
                "id" => count($id)+1,
                "email" => $_POST['mail'],
                "password" => $_POST['password']
              ];
    DBCreate("registerUsers", $insert);
    header('Location: ../index.php?success=register');
  } else {
    header('Location: ../form.php?register=true&exist=register');
  }
?>