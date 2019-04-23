<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mails Integral e funcional</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background-color: #c0c0c0;
        }

        * {
            color: #000 !important;
        }

        input {
            font-size: 1.5em;
        }

        .uppercase {
            text-transform: uppercase;
            font-size: 1.5em !important;
        }
    </style>
</head>
<body>
    <div class="w3-row">
        <form action="AccesValidator.php" method="post" class="w3-container w3-card w3-center w3-col m6 s12 w3-display-middle w3-white"> 
            <div class="w3-container w3-center">
                <h2 class="w3-xxlarge w3-text-grey uppercase">Send Mails</h2>
                <h2 class="w3-xxlarge w3-text-grey">Integral & Funcional</h2>
            </div>
            <input id="email" name="email" class="w3-input w3-border-bottom w3-margin w3-col s11"type="email" placeholder="Email" required>
            <input id="senha" name="senha" class="w3-input w3-border-bottom w3-margin w3-col s11" type="password" placeholder="Senha" required>

            <button onclick="validaDados()" class="w3-margin w3-button w3-border w3-round-large w3-hover-blue w3-large w3-col s11">Entrar</button>
        </form>
    </div>

</body>
</html>
