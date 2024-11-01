<?php
include "conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$data = $_POST['data'];
$cargo = $_POST['cargo'];

// 1º Passo - Comando SQL 
$sql = "UPDATE tb_pessoas SET 
        nome_pessoa = '$nome', 
        data_n_pessoa = '$data',
        cargo_pessoa = '$cargo' 
        WHERE id_pessoa = '$id'";

// 2º Passo - Preparar a conexão
$atualizar = $pdo->prepare($sql);


// 3º Passo - Tentar executar a atualização
try {
    $atualizar->execute();
    if ($atualizar->rowCount() >= 1) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Nenhuma alteração foi feita.";
    }
} catch (PDOException $erro) {
    echo "Falha ao atualizar! " . $erro->getMessage();
}
?>