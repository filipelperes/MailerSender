<!DOCTYPE html>

<html lang="pt-br">

  <head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Title -->
    <title>Send Mails Integral & Funcional - Index</title>
    <!-- Personal Style -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- w3.css / w3.js -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- JS Extern -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>  
    <script src="js/js.js"></script>  
  </head>

  <body class="w3-sand">

    <div class="h-100 w3-display-container w3-text-brown">
      <!-- Header -->
      <div class="w3-row-padding w-100 w3-center w3-display-middle">
        <?php require "template/notify.php"; ?>
        <?php require "template/header.php"; ?>
      </div>
      
      <!-- Buttons -->
      <div class="w3-row w-100 w3-center w3-display-bottommiddle">
        <div class="w3-col s12 m12 l6">
          <button type="button" onclick="redirect('form.php?login=true')" class="w3-button w3-sand w3-hover-brown w3-text-brown uppercase w-100 buttons">Entrar</button>
        </div>
        <div class="w3-col s12 m12 l6">
          <button type="button" onclick="redirect('form.php?register=true')" class="w3-button w3-sand w3-hover-brown w3-text-brown uppercase w-100 buttons">Registrar</button>
        </div>
      </div>

    </div>

  </body>

</html>