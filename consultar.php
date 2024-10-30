<?php
include "conexao.php";

$sql = "SELECT * FROM tb_pessoas ORDER BY id_pessoa DESC";

$consulta = $pdo->prepare($sql);

try{
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $item) {
        $id = $item['id_pessoa'];
        $nome = $item['nome_pessoa'];
        $data = $item['data_n_pessoa'];
        $cargo = $item['cargo_pessoa'];
        echo "
        
            <span class='cx_id'>$id</span> <br>
            <span class='cx_nome'>$nome</span><br>
            <span class='cx_data'>$data</span><br>
            <span class='cx_cargo'>$cargo</span><br>
            <hr>
        ";
    }
}catch(PDOException $erro){
    echo "Falha no inserir!".$erro->getMessage();
}
?>