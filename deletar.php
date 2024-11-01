<?php
include "conexao.php";
$id = $_POST['id'];
// 1º Passo 
$sql = "DELETE FROM tb_pessoas WHERE id_pessoa = '$id'";

// 2º Passo 
$deletar = $pdo->prepare($sql);

// 3º Passo 
try {
    $deletar->execute();
    if ($deletar->rowCount()>=1) {
        echo "Cliente deletado com sucesso!";
    } else {
        echo "Cliente não encontrado.";
    }
} catch (PDOException $erro) {
    echo "Falha ao deletar! " . $erro->getMessage();
}


?>
