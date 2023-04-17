<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD IMC</title>
</head>

<body class="wrapper">
    <header>
        <h1>Formulário para calcular IMC</h1>
    </header>
    <div class="container">
        <div class="dashed">
            <form method="POST" class="Form">

                <label class="label">Coloque o seu nome:</label>
                <input type="text" name="nome" class="inputs" /><br>

                <label class="label">Coloque a seu Ano de Nascimento:</label>
                <input type="text" name="nascimento" class="inputs" /><br>

                <label class="label">Coloque a sua altura:</label>
                <input type="text" name="altura" class="inputs" /><br>

                <label class="label">Coloque o seu Peso:</label>
                <input type="text" name="peso" class="inputs" /><br>

                <div class="botoes">
                    <input type="submit" value="Salvar" class="btSalvar" />
                    <input type="button" value="Consultar" class="btConsulta" onclick="location.href='consultar.php';" />
                </div>
            </form>
        </div>
        <?php require("salvar.php"); ?>
    </div>
</body>

</html>