<?php 
    require "system/accessControl.php"; 
    require "system/config.php";
    require "system/database.php";


    $register = DBRead("mails2sent");

    if(isset($_GET['mine']) && $_GET['mine'] == 'list') {
        $register = DBRead("mails2sent", "WHERE register_for = '{$_SESSION['email']}'");
    }

    function separarBarra($str) {
        $str = explode(" ", $str);
        return implode(" / ", $str);
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
    <title>Send Mails Integral & Funcional - Emails cadastrados</title>
    <!-- Personal Style -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form_list.css">
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
          <a href="form_list.php" class="w3-bar-item w3-btn w3-hover-brown w3-padding w3-leftbar w3-rightbar w3-border-brown"><i class="fa fa-users fa-fw"></i> Emails cadastrados</a>
          <a href="sendMail.php" class="w3-bar-item w3-btn w3-hover-brown w3-padding"><i class="far fa-envelope"></i> Enviar email</a>
          <a href="form_history.php" class="w3-bar-item w3-btn w3-hover-brown w3-padding"><i class="fas fa-history"></i> Histórico de enviados</a>
          <!-- Bottom menu -->
          <div class="w3-display-bottommiddle w-100">
            <button type="button" class="w3-bar-item w3-button w3-brown w3-hover-white w3-hover-text-brown w3-padding w3-center" onclick="w3_menu()"><i class="fas fa-times"></i> Fechar menu</button>
          </div>
        </div>
      </nav>

      <!-- Container Main | Dashboard -->
      <div class="w3-row-padding w-100 w3-display-middle mtX">
        <div class="w3-col w-100 w3-display-container">
           <!-- Cadastrar email -->
          <form method="post" action="system/registerNewMail.php?form=call" class="w3-row-padding w3-content">
            <label class="w3-col s1 m1 l1 w3-button w3-hover-brown" style="padding: 0 8px !important; height: auto !important" for="email"><i class="fas fa-envelope" style="padding: 0 3px !important;"></i></label>
            <div class="w3-col s10 m10 l10">
              <input class="w3-input w3-border-bottom w3-text-brown w3-round" name="email" id="email" type="text" placeholder="Email" required>
            </div>
            <button type="submit" class="w3-col s12 m1 l1 w3-btn w3-brown w3-round w3-hover-brown" style="height: 39px;"><i class="fas fa-plus"></i></button>
          </form>
          <div class="w3-row w3-content w3-margin-top">
              <div class="w3-col s12 m12 l12"><?php require "template/notifyDash.php"; ?></div>
          </div>
          <!-- Filtro Tabela -->
          <div class="w3-row-padding w3-content w3-margin-top fill">
              <button type="button" onclick="filterControl()" class="w3-col s2 m2 l1 w3-padding w3-button w3-hover-brown w3-round div"><i id="i" class="fas fa-chevron-down"></i></button>
              <div class="w3-col s9 m9 l10 w3-margin-right div"><input class="w3-input w3-border-bottom w3-text-brown w3-padding" type="text" placeholder="Pesquisar..." id="myInput" onkeyup="filter()"></div>
              <div id="filters" class="w3-col s11 m12 l11 filter">
                  <div class="w3-row w-100 w3-content w3-center">
                      <p class="w3-col s12 m12 l12 w3-round uppercase">Filtrar por</p>
                      <button type="button" onclick="change(0)" id="id" class="w3-col s12 m4 l4 w3-center w3-button w3-hover-brown">Id</button>
                      <button type="button" onclick="change(1)" id="email2" class="w3-col s12 m4 l4 w3-center w3-button w3-hover-brown w3-brown">Email</button>
                      <button type="button" onclick="change(2)" id="data" class="w3-col s12 m4 l4 w3-center w3-button w3-hover-brown">Data / Hora</button>
                      <?php if(isset($_GET['mine']) && $_GET['mine'] == 'list') { ?>
                        <button id="buttonMine" type="button" onclick="redirect('form_list.php')" class="w3-col s12 m12 l12 w3-round w3-button w3-brown w3-hover-white w3-hover-text-brown uppercase" style="font-weight: 600;">Todos os registros</button>
                      <?php } else { ?>
                        <button id="buttonMine" type="button" onclick="redirect('form_list.php?mine=list')" class="w3-col s12 m12 l12 w3-round w3-button w3-hover-brown" style="font-weight: 600;">Registrados por <?= $_SESSION['email'] ?></button>
                      <?php } ?>
                  </div>
              </div>
          </div>
          <!-- Tabela -->
          <div class="w3-row w3-content w3-margin-top table" style="position: absolute; width: 100%;">
              <div class="w3-col s12 m12 l12">
                  <div class="w3-responsive w3-card-2 w3-round" style="overflow: auto !important;">
                      <table id="myTable" class="w3-table w3-centered">
                          <tr class="w3-brown">
                              <th><button class="w3-button w3-hover-none w3-hover-text-white" type="button" onclick="sortTable(0)" href="form_list.php?id=list">Id</button></th>
                              <th><button class="w3-button w3-hover-none w3-hover-text-white" type="button" onclick="sortTable(1)" href="form_list.php?email=list">Email</button></th>
                              <th><button class="w3-button w3-hover-none w3-hover-text-white" type="button" onclick="sortTable(2)" href="form_list.php?date=list">Data / Hora do registro</button></th>
                              <th><button class="w3-button w3-hover-none w3-hover-text-white" type="button" onclick="sortTable(3)" href="form_list.php?register=list">Registrado por</button></th>
                              <th>&nbsp;</th>
                              
                          </tr>
                          <?php if($register) {
                             foreach($register as $value) { ?>
                            <tr class="w3-hover-brown">
                                <form method="post" action="system/updateRegister.php">
                                    <td style="font-weight: 600 !important;"><input readonly name="id" type="text" value="<?= $value['id'] ?>" style="display: none;"><?= $value['id'] ?></td>
                                    <td style="font-weight: 600 !important;"><?= $value['email'] ?></td>
                                    <td style="font-weight: 600 !important;"><?= separarBarra($value['register_date']) ?></td>
                                    <td style="font-weight: 600 !important;"><?= $value['register_for'] ?></td>
                                    <td><button style="margin: -6px 0 !important; padding: 0 0 !important;" type="submit" class="w3-right w3-xlarge w3-button w3-hover-none w3-hover-text-white"><i class="far fa-times-circle"></i></button></td>
                                </form>
                            </tr>
                          <?php } 
                            } ?>
                      </table>
                  </div>
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
      var decide = 1;
      var boolM = false;
      var boolF = false;

      function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asc"; 
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
          //start by saying: no switching is done:
          switching = false;
          rows = table.rows;
          /*Loop through all table rows (except the
          first, which contains table headers):*/
          for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
              }
            } else if (dir == "desc") {
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
          }
          if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;      
          } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
              dir = "desc";
              switching = true;
            }
          }
        }
      }

      function filterControl() {
        document.getElementById("filters").style.display = (boolF == false) ? "block" : "none";
        document.getElementById("i").className = (boolF == false) ? "fas fa-chevron-up" : "fas fa-chevron-down";
        boolF = !boolF;
      }

      function w3_menu() {
        document.getElementById("mySidebar").style.display = (boolM == false) ? "block" : "none";
        boolM = !boolM;
      }

      function filter() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[decide];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function change(val) {
        decide = val;
        document.getElementById('id').className = "w3-col s12 m4 l4 w3-center w3-button w3-hover-brown"
        document.getElementById('email2').className = "w3-col s12 m4 l4 w3-center w3-button w3-hover-brown"
        document.getElementById('data').className = "w3-col s12 m4 l4 w3-center w3-button w3-hover-brown"
        switch(val) {

            case 0:
                document.getElementById('id').className = "w3-col s12 m4 l4 w3-center w3-button w3-hover-brown w3-brown";
                break;

            case 1:
                document.getElementById('email2').className = "w3-col s12 m4 l4 w3-center w3-button w3-hover-brown w3-brown";
                break;

            case 2:
                document.getElementById('data').className = "w3-col s12 m4 l4 w3-center w3-button w3-hover-brown w3-brown";
                break;

        }
    }
    </script>
  </body>

</html>