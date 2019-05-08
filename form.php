<?php
  if(!isset($_GET['login']) && !isset($_GET['register'])) {
    header('Location: index.php');
  }
?>
<!DOCTYPE html>

<html lang="pt-br">

  <head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Title -->
    <title>Send Mails Integral & Funcional - Login | Cadastro</title>
    <!-- Personal Style -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <!-- w3.css / w3.js -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- JS Extern -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>  
    <script src="js/js.js"></script>  
  </head>

  <body>

    <div class="h-100 w3-display-container w3-text-brown">
      <!-- Header -->
      <div class="w3-row-padding w-100 w3-center w3-display-topmiddle">
        <div class="w3-col s12 m12 l12 w-100">
          <?php require "template/header.php"; ?>
        </div>
      </div>
      
      <div class="w3-row-padding w-100 w3-center w3-display-middle w3-margin-top">
        <?php if(isset($_GET['login']) && $_GET['login']) { ?>
          <form method="post" action="system/validateLogin.php" class="w3-col s12 m12 l12 w-100">
        <?php } ?>
        <?php if(isset($_GET['register']) && $_GET['register']) { ?>
          <form method="post" action="system/validateRegister.php" class="w3-col s12 m12 l12 w-100">
        <?php } ?>
          <div class="w3-col s12 m10 l6 w3-display-middle w3-border-brown w3-padding w3-round-large">
            <?php if(isset($_GET['login']) && $_GET['login']) { ?>  
              <h3 class="uppercase w3-topbar w3-rightbar w3-bottombar w3-leftbar w-100 w3-border-brown h3 w3-padding">Login</h3>
            <?php } ?>
            <?php if(isset($_GET['register']) && $_GET['register']) { ?>  
              <h3 class="uppercase w3-topbar w3-rightbar w3-bottombar w3-leftbar w-100 w3-border-brown h3 w3-padding">Cadastro</h3>
            <?php } ?>
            <input type="email" class="w-100 w3-input w3-border-bottom w3-text-brown w3-center w3-margin-top w3-round" placeholder="Email" required name="mail">
            <input type="password" class="w-100 w3-input w3-border-bottom w3-text-brown w3-center mt-7 w3-round" placeholder="Senha" required name="password">
            <?php if(isset($_GET['login']) && $_GET['login']) { ?>
              <button type="submit" class="w3-btn w3-brown w-100 w3-round-large mt">Logar</button>
            <?php } ?>
            <?php if(isset($_GET['register']) && $_GET['register']) { ?>
              <button type="submit" class="w3-btn w3-brown w-100 w3-hover-brown w3-round-large mt">Cadastrar</button>
              <button type="button" onclick="redirect('form.php?login=true')" class="w3-btn w3-brown w-100 w3-hover-brown w3-round-large mt">Logar</button>
            <?php } ?>
            <?php require "template/notify.php"; ?>
          </div>
        </form> 
      </div>
      <div class="w3-row-padding w3-display-bottommiddle w-100">
        <div class="w3-col s12 m10 l6 w3-display-bottommiddle">
          <button type="button" onclick="redirect('index.php')" class="w-100 w3-btn w3-hover-brown w3-round-large mt">Voltar</button>
        </div>
      </div>
      
    </div>

  </body>

</html>