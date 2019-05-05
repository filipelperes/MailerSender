<?php require "system/accessControl.php"; ?>

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
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- w3.css / w3.js -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- JS Extern -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>  
    <script src="js/js.js"></script>  
  </head>

  <body class="w3-white">

    <div class="h-100 w3-display-container w3-text-brown">
      <!-- Top container -->
      <div class="w3-bar w3-top w3-brown w3-large" style="z-index:4">
        <button type="button" class="w3-bar-item w3-btn w3-hover-brown" onclick="w3_menu()"><i class="fa fa-bars"></i> Menu</button>
        <span class="w3-bar-item w3-right uppercase w3-btn w3-hover-brown" style="letter-spacing: 0.2em;">
          <a href="dashboard.php">Sendmails</a>
        </span>
      </div>

      <!-- Sidebar/menu -->
      <nav style="display: none !important; position: relative !important;" class="w3-sidebar w3-bar-block w3-border-right w3-border-brown w3-animate-left" id="mySidebar"><br>
        <!-- Part 1 menu -->
        <div class="w3-container w3-row-padding w3-center w3-text-brown">
          <div class="w3-col s12 m12 l12 w3-bar mt-menu">
            <div class="w3-col s12 m12 l12 w3-border-brown w3-padding w3-margin-bottom">
              <div>Bem-vindo, <strong><?= $_SESSION['email'] ?></strong></div>
            </div>
            <div class="w3-margin-bottom mt-menu">
              <a href="system/logout.php" class="w3-bar-item w3-btn w3-hover-brown w3-brown w3-text-sand w3-hover-text-sand w3-center w3-round-large" style="width: 45% !important; margin: 0 auto !important;">Sair <i class="fas fa-sign-out-alt"></i></a>
            </div>
          </div>
        </div>
        <hr class="w3-border-brown">
        <!-- Part 2 menu -->
        <div class="w3-container w3-center w3-text-brown w3-text-bolder uppercase w3-display-container">
          <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block w3-text-brown">
          <a href="dashboard.php" class="w3-bar-item w3-btn w3-hover-brown w3-padding w3-leftbar w3-rightbar w3-border-brown"><i class="fas fa-home"></i> Home</a>
          <a href="#" class="w3-bar-item w3-btn w3-hover-brown w3-padding"><i class="fa fa-users fa-fw"></i> Emails cadastrados</a>
          <a href="#" class="w3-bar-item w3-btn w3-hover-brown w3-padding"><i class="far fa-envelope"></i> Enviar email</a>
          <a href="#" class="w3-bar-item w3-btn w3-hover-brown w3-padding"><i class="fas fa-history"></i> Histórico de enviados</a>
          <!-- Bottom menu -->
          <div class="w3-display-bottommiddle w-100">
            <button type="button" class="w3-bar-item w3-button w3-brown w3-hover-white w3-hover-text-brown w3-padding w3-center" onclick="w3_menu()"><i class="fas fa-times"></i> Fechar menu</button>
          </div>
        </div>
      </nav>

      <!-- Container Main | Dashboard -->
      <div class="w3-row-padding w-100 w3-display-middle">
        <div class="w3-col w-100 w3-display-container">
           <!-- Cadastrar email -->
          <form method="post" action="system/registerNewMail.php" class="w3-row-padding w3-content">
            <label class="w3-col s1 m1 l1 w3-button w3-hover-brown" style="padding: 0 8px !important; height: auto !important" for="email"><i class="fas fa-envelope" style="padding: 0 3px !important;"></i></label>
            <div class="w3-col s10 m10 l10">
              <input class="w3-input w3-border-bottom w3-text-brown" name="email" id="email" type="text" placeholder="Email" required>
            </div>
            <button type="submit" class="w3-col s12 m1 l1 w3-btn w3-brown w3-round w3-hover-brown" style="height: 39px;"><i class="fas fa-plus"></i></button>
          </form>
          <!-- Notify Dashboard -->
          <div class="w3-row w3-content">
            <?php require "template/notifyDash.php"; ?>
          </div>
          <!-- Buttons Dashboard Main -->
          <div class="w3-row w3-content w3-middle mt-menu dash">
            <div class="w3-row w3-col s12 m12 l12">
              <button class="w3-col s12 m12 l12 w3-button w3-hover-none w3-hover-text-brown w3-card-2 card-buttons" disabled>
                  <h2 class="w3-col s2 m2 l2"><i class="fas fa-home"></i></h2>
                  <h3 class="w3-rest w3-brown">Home</h3>
              </button>

              <button onmouseout="normal(this)" onmouseover="hover(this)" class="w3-col s12 m12 l12 w3-button w3-hover-none w3-hover-text-brown w3-card-2 card-buttons">
                  <h2 class="w3-col s2 m2 l2 w3-brown"><i class="fa fa-users fa-fw"></i></h2>
                  <h3 class="w3-rest">Emails Cadastrados</h3>
              </button>

              <button onmouseout="normal(this)" onmouseover="hover(this)" class="w3-col s12 m12 l12 w3-button w3-hover-none w3-hover-text-brown w3-card-2 card-buttons">
                  <h2 class="w3-col s2 m2 l2 w3-brown"><i class="far fa-envelope"></i></h2>
                  <h3 class="w3-rest">Enviar email</h3>
              </button>

              <button onmouseout="normal(this)" onmouseover="hover(this)" class="w3-col s12 m12 l12 w3-button w3-hover-none w3-hover-text-brown w3-card-2 card-buttons">
                  <h2 class="w3-col s2 m2 l2 w3-brown"><i class="fas fa-history"></i></h2>
                  <h3 class="w3-rest">Histórico de enviados</h3>
              </button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <footer class="w3-center w3-bottom">
        <p>Desenvolvido por <a target="_blank" href="http://linkedin.com/in/filipelperes">Filipe Lago Peres</a></p>
      </footer>
    </div>

    <script>
      var bool = false;

      function w3_menu() {
        document.getElementById("mySidebar").style.display = (bool == false) ? "block" : "none";
        bool = !bool;
      }

      function hover(x) {
        var c = x.children;
        console.log(x.children);
        c[0].className ="w3-col s2 m2 l2";
        c[1].className = "w3-rest w3-brown";
      }

      function normal(x) {
        var c = x.children;
        console.log(x.children);
        c[0].className = "w3-col s2 m2 l2 w3-brown";
        c[1].className = "w3-rest";
      }
    </script>
  </body>

</html>