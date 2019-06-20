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
</head>
<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row content-center">
            <div class="col-md-7 col-sm-12 col-md-offset-4">
                <h1>Cadastrar Categoria</h1>
                <hr>
        
                <form method="POST" action="inc/cadastrar-categoria.php">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>Dscriçao da Categoria:</label>
                                <input type="text" name="descricao" class="form-control" maxlength="7" required/>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div>
                                <label>Valor:</label>
                                <input type="text" name="valor" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>status:</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="1">Disponível</option>
                                    <option value="2">Indiponível</option>
                                    <option value="3">Manutenção</option>
                                </select>
                            </div>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-md-4 botao col-md-offset-2">
                            <label></label>
                            <input type="submit" name="cadastrar" class="btn btn-success btn-block" value="Cadastrar"/>
                        </div>
                        <div class="col-md-4 botao">
                            <label></label>
                            <a href="http://localhost/locadora/dashboard.php?p=veiculos.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
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