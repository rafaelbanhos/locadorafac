<?php 
//include('dashboard.php');
require_once('inc/conexao.php');

$idVeiculo = $_GET["id_veiculo"];

$pdo=Database::conexao();
$stmt = $pdo->prepare('SELECT * FROM tb_veiculo WHERE id_veiculo = :id_veiculo');
$stmt->bindParam(':id_veiculo', $idVeiculo);   
$stmt->execute();
$veiculo = $stmt->fetch(PDO::FETCH_ASSOC);
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
                <h1>Alterar Veiculo</h1>
                <hr>

                <form method="POST" action="inc/alterar-veiculo.php?id_veiculo=<?php echo $idVeiculo?>">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>Placa:</label>
                                <input type="text" name="placa" class="form-control" value="<?php echo $veiculo['placa']; ?>" maxlength="7" required/>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div>
                                <label>Modelo:</label>
                                <input type="text" name="modelo" value="<?php echo $veiculo['modelo']; ?>" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>Marca:</label>
                                <input type="text" name="marca" value="<?php echo $veiculo['marca']; ?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div>
                                <label>Cor:</label>
                                <input type="text" name="cor" value="<?php echo $veiculo['cor']; ?>" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-md-offset-2">
                            <div>
                                <label>Categoria:</label><?php $categoria = $veiculo['id_categoria']; ?>
                                <select name="id_categoria" class="form-control" value="<?php echo $veiculo['id_categoria']; ?>">
                                    <option value="1" <?=($categoria == "1")?'selected':''?>>Economico</option>
                                    <option value="2" <?=($categoria == "2")?'selected':''?>>Compacto</option>
                                    <option value="3" <?=($categoria == "3")?'selected':''?>>Utilitario</option>
                                    <option value="4" <?=($categoria == "4")?'selected':''?>>Full-Size</option>
                                    <option value="5" <?=($categoria == "5")?'selected':''?>>Luxo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label>Status:</label><?php $status = $veiculo['situacao']; ?>
                            <select name="status" class="form-control" value="<?php echo $veiculo['situacao']; ?>">
                                <option value="H" <?=($status == "H")?'selected':''?>>Habilitado</option>
                                <option value="D" <?=($status == "D")?'selected':''?>>Desabilitado</option>
                            </select>
                        </div>
                        <div class="col-md-4 botao col-md-offset-2">
                            <label></label>
                            <input type="submit" name="alterar" class="btn btn-success btn-block" value="Alterar"/>
                        </div>
                        <div class="col-md-4 botao">
                            <label></label>
                            <a href="veiculos.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
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