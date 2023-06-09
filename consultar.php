<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>

<body>
    <?php
    require_once("conexao.php");

    $conexao = novaConexao();

    if (isset($_GET['excluir'])) {

        $delete = "DELETE FROM cadastros WHERE id = ?";
        $stmt = $conexao->prepare($delete);
        $stmt->bind_param("i", $_GET['excluir']);
        $stmt->execute();
    }

    $sql = "SELECT * FROM cadastros";

    $resultado = $conexao->query($sql);

    $registros = [];

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $registros[] = $row;
        }
    } else if ($conexao->error) {
        echo ":( Erro: " . $conexao->error;
    }

    $conexao->close();

    ?>

    <table border="3">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Altura</th>
            <th>Peso</th>
        </thead>

        <tbody>
            <?php foreach ($registros as $registro): ?>
                <tr>
                    <td>
                        <?= $registro['id'] ?>
                    </td>
                    <td>
                        <?= $registro['nome'] ?>
                    </td>
                    <td>
                        <?= date('Y', strtotime($registro['nascimento'])); ?>
                    </td>
                    <td>
                        <?= $registro['altura'] ?>
                    </td>
                    <td>
                        <?= $registro['peso'] ?>
                    </td>
                    <td>
                        <a href="consultar.php?excluir=<?= $registro['id'] ?>"> Excluir </a>
                    </td>
                    <td>
                        <a href="alterar.php?codigo=<?= $registro['id'] ?>"> Alterar </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>