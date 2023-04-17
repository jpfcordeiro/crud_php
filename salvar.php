    <?php
    if (isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $idade = date('Y') - $_POST['nascimento'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $imc = $peso /($altura * $altura );
        $categoria;
        
        if($imc>40)
        {$categoria = "Obesidade Grave";}
        elseif($imc >= 30 && $imc < 40 ){
            $categoria = "Obesidade";
        }elseif ( $imc >= 25 && $imc < 30){
            $categoria = "Sobrepeso";
        }elseif ( $imc >= 18.5 && $imc < 25){
            $categoria = "Normal";
        }elseif ($imc < 18.5){
            $categoria = "Magreza";
        }

        echo "<br>Olá! $nome você tem $idade anos, seu IMC é $imc, tratando-se de $categoria!";
    
    require("conexao.php");

    $conexao = novaConexao(null); 

    $sql='CREATE DATABASE IF NOT EXISTS crud_imc';

    $resultado = $conexao->query($sql); 

    if($resultado){
        echo "<br>Banco de Dados CRIADO com SUCESSO :)";
    }else{
        echo ":( Erro: ".$conexao->error;
    }


    $sql="CREATE TABLE IF NOT Exists cadastros(
        id int(6) auto_increment primary key,
        nome varchar(50) not null,
        nascimento int(3),
        altura double,
        peso double
    )";

    $conexao = novaConexao();

    $resultado = $conexao->query($sql);

    if($resultado){
        echo "<br>Tabela CRIADA com SUCESSO :)";
    }else{
        echo ":( Erro: ".$conexao->error;
    }

    $erros = [];
    $dados = $_POST;
         
         $sql="INSERT INTO cadastros (nome, nascimento, altura, peso) values (?, ?, ?, ?)";

         $insert = $conexao->prepare($sql);

         $params = [
             $dados['nome'],
             $dados['nascimento'],
             $dados['altura'],
             $dados['peso'],
            
         ];
         
         $insert->bind_param("sidd", ...$params);
         
         if ($insert->execute()){
             unset($dados); 
         }

        }
 ?>
