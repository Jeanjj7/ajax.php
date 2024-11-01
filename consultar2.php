<link rel="stylesheet" href="estilo.css">
<?php
include "conexao.php";

$sql = "SELECT * FROM tb_pessoas";

// 2º Passo 
$consultar = $pdo->prepare($sql);


// 3º Passo 
try {
    $consultar->execute();
    $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $item) {
        $id = $item['id_pessoa'];
        $nome = $item['nome_pessoa'];
        $data = $item['data_n_pessoa'];
        $cargo = $item['cargo_pessoa'];
       echo "
            <div class='cartao_pessoa'>
                COD: <span class='codigo'>$id</span><br>
                NOME: <span class='nome'>$nome</span><br>
                DATA DE NASCIMENTO: <span class='data_nasc'>$data</span><br>
                CARGO: <span class='cargo'>$cargo</span><br><br>
            </div>
       ";
    }
} catch (PDOException $erro) {
    echo "Falha ao consultar: " . $erro->getMessage();
}

?>