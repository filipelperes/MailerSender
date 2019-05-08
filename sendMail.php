<?php 
    require "system/accessControl.php";
    require "system/config.php";
    require "system/database.php";

    $read = [];
    
    if(isset($_GET['subject']) && isset($_GET['msg'])) {
        $read = DBRead('mails2sent');
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
    <title>Send Mails Integral & Funcional - Enviar email</title>
    <!-- Personal Style -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sendMail.css">
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
      <!-- Top container -->
      <div class="w3-bar w3-top w3-brown w3-large" style="z-index:4">
        <button type="button" class="w3-bar-item w3-btn w3-hover-brown" onclick="w3_menu()"><i class="fa fa-bars"></i> Menu</button>
        <span class="w3-bar-item w3-right uppercase w3-btn w3-hover-brown" style="letter-spacing: 0.2em;">
          <a href="dashboard.php">Sendmails</a>
        </span>
      </div>

      <!-- Sidebar/menu -->
      <nav style="display: none !important; position: fixed !important;" class="w3-sidebar w3-bar-block w3-border-right w3-border-brown w3-animate-left" id="mySidebar"><br>
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
          <a href="dashboard.php" class="w3-bar-item w3-btn w3-hover-brown w3-padding"><i class="fas fa-home"></i> Home</a>
          <a href="form_list.php" class="w3-bar-item w3-btn w3-hover-brown w3-padding"><i class="fa fa-users fa-fw"></i> Emails cadastrados</a>
          <a href="sendMail.php" class="w3-bar-item w3-btn w3-hover-brown w3-padding w3-leftbar w3-rightbar w3-border-brown"><i class="far fa-envelope"></i> Enviar email</a>
          <a href="form_history.php" class="w3-bar-item w3-btn w3-hover-brown w3-padding"><i class="fas fa-history"></i> Histórico de enviados</a>
          <!-- Bottom menu -->
          <div class="w3-display-bottommiddle w-100">
            <button type="button" class="w3-bar-item w3-button w3-brown w3-hover-white w3-hover-text-brown w3-padding w3-center" onclick="w3_menu()"><i class="fas fa-times"></i> Fechar menu</button>
          </div>
        </div>
      </nav>

      <!-- Container Main | Dashboard -->
      <div class="w3-row-padding w-100 w3-display-middle">
        <div class="w3-col w-100 w3-display-container steps">
          <div class="w3-row w-100">
              <?php if(count($_GET) == 0) { ?>
                <button type="button" class="w3-col s12 m12 l12 w3-button w3-hover-brown w3-round w3-brown">Etapa 1. Preparar Mensagem</button>
                <form action="sendMail.php" class="form1 w3-col s12 m12 l12 w3-center">
                    <input name="subject" type="text" placeholder="Assunto" class="w3-text-brown w3-col s12 m12 l10 w3-input w3-center w3-border-bottom">
                    <label class="w3-col s12 m12 l10" for="text">Mensagem</label>
                    <textarea style="overflow: auto;" name="msg" id="text" cols="30" rows="10" class="w3-padding w3-text-brown w3-col s12 m12 l10 w3-input w3-border-bottom"></textarea>
                    <button type="reset" class="w3-col s12 m12 l10 w3-button w3-brown w3-hover-white w3-hover-text-brown w3-round">Limpar</button>
                    <button type="submit" class="w3-col s12 m12 l10 w3-button w3-brown w3-hover-white w3-hover-text-brown w3-round">Selecionar emails</button>
                </form>
              <?php } else { ?>  
                <button type="button" class="w3-col s12 m12 l12 w3-button w3-hover-green w3-round w3-green" style="margin-bottom: 0.75% !important;">Etapa 1. Preparar Mensagem <i class="fas fa-check"></i></button>
              <?php } ?>  
          </div>
          <div class="w3-row w-100">
              <?php if(count($_GET) == 0) { ?>
                <button type="button" class="w3-col s12 m12 l12 w3-button w3-hover-none w3-hover-text-brown w3-border w3-border-brown w3-round" style="margin-bottom: 0.75% !important;">Etapa 2. Selecionar emails para enviar</button>
                <?php } else if(isset($_GET['subject']) && isset($_GET['msg'])) { ?>
                    <button type="button" class="w3-col s12 m12 l12 w3-button w3-hover-brown w3-round w3-brown">Etapa 2. Selecionar emails para enviar</button>
                    <div class="w3-row w-100 w3-content w3-center form2">
                        <input style="margin-top: 1%;" class="w3-col s12 m12 l12 w3-input w3-border-bottom w3-text-brown w3-padding" type="text" placeholder="Pesquisar..." id="myInput" onkeyup="filter()">
                        <form id="form" method="post" action="system/sendMail.php" class="w3-row">
                            <div style="margin-left: 2%;" class="w3-col l1 w3-hide-medium w3-hide-small div">&nbsp;</div>
                            <div id="selectBox" class="w3-col w3-content w3-border w3-border-brown w3-round" style="position: absolute; height: 300px !important; margin-top: 1%; padding-left: 12.5%; overflow: auto;">
                            <input style="display: none;" readonly name="subject" type="text" placeholder="Assunto" value="<?= $_GET['subject'] ?>" >
                            <textarea readonly style="display: none;" name="message" id="text" cols="30" rows="10"><?= $_GET['msg'] ?></textarea>
                              <?php if($read) { 
                                foreach($read as $value) { ?>
                                  <p class="w3-col s12 m6 l5 p">
                                    <input id="<?= $value['id'] ?>" class="w3-check checkClick" type="checkbox" name="email#<?= $value['id'] ?>" value="<?= $value['email'] ?>">
                                    <label for="<?= $value['id'] ?>"><?= $value['email'] ?></label>
                                  </p>
                                <?php }} ?>
                              </div>
                              <div id='divBtn' class="w3-col s12 m12 l12" style="margin: 31.15% 0 1% 0; z-index: 9999;">
                                <div style="margin-left: 3%; width: 2%;" class="w3-col w3-hide-medium w3-hide-small div">&nbsp;</div>
                                <button id="btn" type="button" onclick="selectAll()" class="w3-col s12 m12 l5 w3-button w3-brown w3-hover-white w3-hover-text-brown w3-round">Selecionar todos</button>
                                <div style="margin-left: 3%; width: 2%;" class="w3-col w3-hide-medium w3-hide-small div">&nbsp;</div>
                                <button type="submit" class="w3-col s12 m12 l5 w3-button w3-brown w3-hover-white w3-hover-text-brown  w3-round">Enviar e-mail</button>
                            </div>
                        </form>
                    </div>
                    <?php } else { ?>
                    <button type="button" class="w3-col s12 m12 l12 w3-button w3-hover-green w3-round w3-green">Etapa 2. Selecionar emails para enviar <i class="fas fa-check"></i></button>
                    <?php } ?>
                    
                  </div>
                  <div class="w3-row w-100">
                    <?php if(count($_GET) == 0 || (isset($_GET['subject']) && isset($_GET['msg']))) { ?>
                      <button type="button" class="w3-col s12 m12 l12 w3-button w3-hover-none w3-hover-text-brown w3-border w3-border-brown w3-round">Etapa 3. Finalizado</button type="button">
                      <?php } else { ?>
                        <button type="button" class="w3-col s12 m12 l12 w3-button w3-hover-green w3-round w3-green" style="margin-top: 1%;">Etapa 3. Finalizado <i class="fas fa-check"></i></button>
                        <h2 class="w3-col s12 m12 l12 w3-text-green w3-center w3-padding" style="margin-top: 1%;">E-mail enviado com sucesso!</h2>
                        <div class="w3-row w-100 w3-content">
                          <div class="w3-col l3 w3-hide-medium w3-hide-small">&nbsp;</div>
                          <button type="button" onclick="redirect('dashboard.php')" class="w3-col s12 m12 l6 w3-btn w3-brown w3-hover-white w3-hover-text-brown w3-border w3-border-brown w3-round">Dashboard</button>
                        </div>
                      <? } ?>
              <div class="w3-col s12 m12 l12"></div>
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
      var boolT = false;
      var arr = [];

      function selectAll() {
        document.getElementById("btn").innerHTML = (boolT == false) ? "Limpar Seleção" : "Selecionar Todos";
        boolT = !boolT;
        var checkClick = document.getElementsByClassName('checkClick');
        if(boolT) {
          for (let i = 0; i < checkClick.length; i++) {
            if(checkClick[i].checked) {
              continue;
            }
            click(checkClick[i]);
          }
        } else {
          for (let i = 0; i < checkClick.length; i++) {
            if(checkClick[i].checked) {
              click(checkClick[i]);
            }
            continue;
          }
        }
        
      }

      function click(element) {
        element.click()
      }
      
      function w3_menu() {
        document.getElementById("mySidebar").style.display = (bool == false) ? "block" : "none";
        bool = !bool;
      }

      function filter() {
        var input, filter, form, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        form = document.getElementById("form");
        p = form.getElementsByClassName("p");
        for (i = 0; i < p.length; i++) {
            label = p[i].getElementsByTagName("label")[0];
            txtValue = label.textContent || label.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                p[i].style.display = "";
            } else {
                p[i].style.display = "none";
            }
        }
      }

      
    </script>
  </body>

</html>