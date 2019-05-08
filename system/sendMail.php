<?php 
    require "accessControl.php";
        
    if(!isset($_POST['message']) || count($_POST) == 0) {
        header('Location: ../sendMail.php');
    }
    
    require "config.php";
    require "database.php";

    $insert = [];
    $mails = [];
    $count = [];

    $count = DBRead('historysentmails');
    $insert['id'] = count($count) + 1;
    $insert['sent_for'] = $_SESSION['email'];
    foreach($_POST as $k => $val) {
        if($k == 'subject' || $k == 'message') {
            $insert[$k] = $val;
        } else {
            $mails[] = $val;
        }
    }
    
    $insert['mails2sent'] = implode("; ", $mails);

    $read = DBRead('historysentmails', "WHERE message = '{$insert['message']}' AND mails2sent = '{$insert['mails2sent']}'");

    if(!$read) {
      DBCreate('historysentmails', $insert);
    }

    foreach($mails as $to) {
        mail($to, $insert['subject'], $insert['message']);
    }

    header('Location: ../sendMail.php?success=sent');
?>

<!DOCTYPE html>

<html lang="pt-br">

  <head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Title -->
    <title>Send Mails Integral & Funcional - Enviando</title>
    <!-- Personal Style -->
    <link rel="stylesheet" href="../css/sending.css">
    <link rel="stylesheet" href="../css/main.css">
    <!-- w3.css / w3.js -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- JS Extern -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>  
    <script src="js/js.js"></script>  
  </head>

  <body>

    <div class="h-100 w3-display-container w3-text-brown" style="overflow: auto">
      <!-- Container Main | Dashboard -->
      <div class="w3-row-padding w-100 w3-display-middle w3-center">
        <img src="../img/Spinner-1.5s-200px.gif" alt="">
        <h2>Processando</h2>
      </div>
      
      <!-- Footer -->
      <footer class="w3-center w3-bottom">
        <p>Desenvolvido por <a target="_blank" href="http://linkedin.com/in/filipelperes">Filipe Lago Peres</a></p>
      </footer>
    </div>
  </body>

</html>