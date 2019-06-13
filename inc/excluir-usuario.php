<?php
require_once('conexao.php');
$idUsuario = $_GET["id_usuario"];
try{
    $pdo=Database::conexao();
    $stmt = $pdo->prepare('DELETE FROM tb_usuario WHERE id_usuario = :id_usuario');
    $stmt->bindParam(':id_usuario', $idUsuario);   
    $stmt->execute();

    $mensagem = 'Usuário excluido com sucesso!';
    $location = '../usuarios.php';

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