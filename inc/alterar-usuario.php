<?php 
require_once('conexao.php');

try{
    $pdo=Database::conexao();
    $stmt = $pdo->prepare('UPDATE tb_usuario SET login = :login, senha = :senha, nome = :nome, cpf = :cpf, email = :email, status=:status , perfil =:perfil WHERE id_usuario = :id_usuario');
    $stmt->bindParam(':id_usuario', $_GET["id_usuario"]);
    $stmt->bindParam(':login', $_POST['login']);
    $stmt->bindParam(':senha', $_POST['senha']);
    $stmt->bindParam(':nome', $_POST['nome']);   
    $stmt->bindParam(':cpf', $_POST['cpf']);
    $stmt->bindParam(':email', $_POST['email']);   
    
    $stmt->bindParam(':perfil', $_POST['id_perfil_usuario']);
    
    $stmt->bindParam(':status', $_POST['status']); 
    $stmt->execute();

    $mensagem = 'Alteração realizada com sucesso!';
    $location = 'http://localhost/locadora/dashboard.php?p=usuarios.php';

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
