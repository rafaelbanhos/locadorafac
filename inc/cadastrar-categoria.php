<?php
require_once('conexao.php');

/*CADASTRAR USUARIO*/
$descricao = $_POST["descricao"];
$valor =  (float) str_replace(',', '.', $_POST["valor"]);
$status = $_POST["status"];

$pdo=Database::conexao();
    try {
        $stmt = $pdo->prepare('INSERT INTO tb_categoria (descricao,valor,status) VALUES(:descricao,:valor,:status)');
        $stmt->execute(array(
        ':descricao' => $descricao,
        ':valor' => $valor,
        ':status' => $status
        ));

        $mensagem = 'Categoria cadastrada com sucesso!';
        $location = 'http://localhost/locadora/dashboard.php?p=categorias.php';

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