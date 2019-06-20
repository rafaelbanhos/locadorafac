<?php
require_once('conexao.php');

/*CADASTRAR VEICULO*/
$placa = $_POST["placa"];
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$cor = $_POST["cor"];
$ano = $_POST["ano"];
$quantidade = $_POST["quantidade"];
$status = $_POST["status"];
$categoria = $_POST["categoria"];


$pdo=Database::conexao();

$verifica = $pdo->prepare('SELECT * FROM tb_veiculo WHERE placa = :placa');
$verifica->bindValue(":placa", $_POST['placa']);
$verifica->execute();

$rows = $verifica->rowCount();
if($rows>=1){
    $mensagem = 'Veiculo já cadastrado, tente outro!';
    $location = '../veiculos.php';

    // criar e exibir o javascript
    echo '<script>';
        printf("alert('%s');\n", $mensagem);
        if (!empty($location)) {
            printf("window.location.href = '%s'\n", $location);
        }
    echo '</script>';
} else {
    try {
        
        $stmt = $pdo->prepare('INSERT INTO tb_veiculo (id_categoria,placa,modelo,marca,cor,situacao,ano,quantidade) VALUES (:id_categoria, :placa, :modelo, :marca, :cor, :situacao, :ano, :quantidade)');
        $stmt->execute(array(
            ':id_categoria' => $categoria,
            ':placa' => $placa,
            ':modelo' => $modelo,
            ':marca' => $marca,
            ':cor' => $cor,
            ':situacao' => $status,
            ':ano' => $ano,
            ':quantidade' => $quantidade,
            
        ));

        $mensagem = 'Veiculo cadastrado com sucesso!';
        $location = 'http://localhost/locadora/dashboard.php?p=veiculos.php';

        // criar e exibir o javascript
        echo '<script>';
            printf("alert('%s');\n", $mensagem);
            if (!empty($location)) {
                printf("window.location.href = '%s'\n", $location);
            }
        echo '</script>';
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>