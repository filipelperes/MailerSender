<?php if(isset($_GET['success']) && $_GET['success'] == 'register') { ?>
<div id="notify" class="w3-row w3-content w-100 w3-center w3-margin-top" style="margin-top: -13% !important;">
  <div class="w-100">
    <div class="w3-row w3-bottombar w3-leftbar w3-topbar w3-rightbar w3-border-green w3-text-green">
        <div class="w3-col s10 m10 l10">
          <p style="font-size: 15pt;">E-mail cadastrado com sucesso!</p>
        </div>
        <button type="button" onclick="w3.hide('#notify')" class="w3-rest w3-round-xxlarge w3-xlarge w3-button w3-hover-green" style="margin-top: 1%;"><i class="fas fa-times"></i></button>
    </div>
  </div>
</div>
<?php } ?>
<?php if((isset($_GET['exist']) && $_GET['exist'] == 'register')) { ?>
<div id="notify" class="w3-row w3-content w3-center w-100">
  <div class="w-100">
    <div class="w3-row w3-bottombar w3-leftbar w3-topbar w3-rightbar w3-border-red w3-text-red">
        <div class="w3-col s10 m10 l10">
            <?php if(isset($_GET['login']) && $_GET['login']) { ?>
              <p style="font-size: 15pt;">Login e/ou senha incorreto(s)!</p>
            <?php } ?>
            <?php if(isset($_GET['register']) && $_GET['register']) { ?>
              <p style="font-size: 15pt;">E-mail já cadastrado!</p>
            <?php } ?>
        </div>
        <button type="button" onclick="w3.hide('#notify')" class="w3-rest w3-large w3-round-xxlarge w3-button w3-hover-red" style="margin-top: 2%;"><i class="fas fa-times"></i></button>
    </div>
  </div>
</div>
<?php } ?>