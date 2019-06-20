<?php 
//include('dashboard.php');


$pdo = Database::conexao();
$stmt = $pdo->prepare("SELECT * FROM tb_categoria");
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <h1>Cadastrar Veiculo</h1>
                <hr>
        
                <form method="POST" action="inc/cadastrar-veiculo.php">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>Placa:</label>
                                <input type="text" name="placa" class="form-control" maxlength="7" required/>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div>
                                <label>Modelo:</label>
                                <input type="text" name="modelo" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>Marca:</label>
                                <input type="text" name="marca" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div>
                                <label>Cor:</label>
                                <input type="text" name="cor" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>Ano:</label>
                                <input type="text" name="ano" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div>
                                <label>Quantidade:</label>
                                <input type="text" name="quantidade" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>Categoria:</label>
                                <select name="categoria" class="form-control">
                                <option value="">Selecione a Categoria</option>
                                <?php foreach($categorias as $c){ ?>
                                    <option value="<?php echo $c['id_categoria']; ?>"><?php echo $c['descricao'] ?></option>
                                <?php } ?>
                                
                            </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label>Status:</label>
                            <select name="status" class="form-control">
                                <option value="H" selected>Habilitado</option>
                                <option value="D">Desabilitado</option>
                            </select>
                        </div>
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