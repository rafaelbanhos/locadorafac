<?php 
//include('dashboard.php');
require_once('inc/conexao.php');

$idUsuario = $_GET["id_usuario"];

$pdo=Database::conexao();
$stmt = $pdo->prepare('SELECT * FROM tb_usuario WHERE id_usuario = :id_usuario');
$stmt->bindParam(':id_usuario', $idUsuario);   
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        @media (max-width: 575.98px) {
            h1 {
                text-align: center;
            }
            .botao1{
                margin-top: 5px;
            }
            
            .botao2{
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row content-center">
            <div class="col-md-7 col-sm-12 col-md-offset-4">
                <h1>Alterar Usuário</h1>
                <hr>

                <form method="POST" action="inc/alterar-usuario.php?id_usuario=<?php echo $idUsuario?>">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Login:</label>
                                <input type="text" name="login" value="<?php echo $usuario['login']; ?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div>
                                <label>Senha:</label>
                                <input type="password" name="senha" value="<?php echo $usuario['senha']; ?>" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Nome:</label>
                                <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>CPF:</label>
                                <input type="text" name="cpf" value="<?php echo $usuario['cpf']; ?>" id="cpf" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>Email:</label>
                                <input type="email" name="email" value="<?php echo $usuario['email']; ?>" class="form-control" required/>
                            </div>
                        </div>
                    </div>                                      
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Perfil:</label>
                                <select name="id_perfil_usuario" class="form-control">                                
                                <option value="3" selected>Funcionario</option>
                                <option value="1">Cliente</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <label>Status:</label>
                            <select name="status" class="form-control">
                                <option value="H" selected>Habilitado</option>
                                <option value="D">Desabilitado</option>
                            </select>
                        </div>
                        <div class="col-md-5 botao1 col-md-offset-1">
                            <label></label>
                            <input type="submit" name="alterar" class="btn btn-success btn-block" value="Alterar"/>
                        </div>
                        <div class="col-md-5 botao2">
                            <label></label>
                            <a href="http://localhost/locadora/dashboard.php?p=usuarios.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>