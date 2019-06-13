<?php
require_once('conexao.php');
$idVeiculo = $_GET["id_veiculo"];
try{
    $pdo=Database::conexao();
    $stmt = $pdo->prepare('DELETE FROM tb_veiculo WHERE id_veiculo = :id_veiculo');
    $stmt->bindParam(':id_veiculo', $idVeiculo);   
    $stmt->execute();

    $mensagem = 'Veiculo excluido com sucesso!';
    $location = '../veiculos.php';

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