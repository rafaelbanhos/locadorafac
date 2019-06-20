<?php 
require_once('conexao.php');

$idVeiculo = $_GET["id_veiculo"];

try{
    $pdo=Database::conexao();
    $stmt = $pdo->prepare('UPDATE tb_veiculo SET id_categoria = :id_categoria, placa = :placa, modelo = :modelo, marca = :marca, cor = :cor, situacao = :situacao, ano = :ano, quantidade = :quantidade WHERE id_veiculo = :id_veiculo');
    $stmt->bindParam(':id_veiculo', $idVeiculo);
    $stmt->bindParam(':id_categoria', $_POST['id_categoria']);   
    $stmt->bindParam(':placa', $_POST['placa']);
    $stmt->bindParam(':modelo', $_POST['modelo']);   
    $stmt->bindParam(':marca', $_POST['marca']); 
    $stmt->bindParam(':cor', $_POST['cor']);   
    $stmt->bindParam(':situacao', $_POST['status']);
    $stmt->bindParam(':ano', $_POST['ano']);
    $stmt->bindParam(':quantidade', $_POST['quantidade']);
    $stmt->execute();

    $mensagem = 'Alteração realizada com sucesso!';
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
?>
