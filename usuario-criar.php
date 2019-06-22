<?php 
//include('dashboard.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        .botao{
            margin-top: 5px;
        }

        @media (max-width: 575.98px) {
            h1 {
                text-align: center;
            }
            .botao{
                margin-top: -5px;;
            }
        }
    </style>
    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    <script>
        jQuery(function($){
            $("#cpf").mask("999.999.999-99");
            $("#cep").mask("99999-999");
        });
    </script>
</head>
<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row content-center">
            <div class="col-md-7 col-sm-12 col-md-offset-2">
                <h1>Cadastrar Usuário</h1>
                <hr>
        
                <form method="POST" action="inc/cadastrar-usuario.php">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Login:</label>
                                <input type="text" name="login" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div>
                                <label>Senha:</label>
                                <input type="password" name="senha" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Nome:</label>
                                <input type="text" name="nome" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>CPF:</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" required/>
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
                        <div class="col-md-5 botao col-md-offset-1">
                            <label></label>
                            <input type="submit" name="cadastrar" class="btn btn-success btn-block" value="Cadastrar"/>
                        </div>
                        <div class="col-md-5 botao">
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