<?php
// include('dashboard.php');
require_once('inc/conexao.php');

$pdo = Database::conexao();
$stmt = $pdo->prepare("SELECT * FROM tb_veiculo where id_veiculo = :id_veiculo");
$stmt->bindParam(':id_veiculo', $_GET["id_veiculo"]);
$stmt->execute();
$veiculo = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['id_veiculo'] = $veiculo['id_veiculo'];


//Consulta Categoria Associada ao Veiculo
$categoriaVeiculo = $pdo->prepare("SELECT * FROM tb_categoria WHERE id_categoria = :idCategoria");
$categoriaVeiculo->bindParam(':idCategoria', $veiculo['id_categoria']);
$categoriaVeiculo->execute();
$categoriaV = $categoriaVeiculo->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <style>
        .perso {
            margin-top: 30px;
        }

        @media (max-width: 575.98px) {
            .botao1 {
                margin-top: 5px;
            }

            .botao2 {
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
                <h1>Reservar Veiculo</h1>
                <hr>
                <form method="GET" action="inc/reservar.php">
                    <input type="hidden" name="id_veiculo" value="<?php echo $veiculo['id_veiculo']; ?>">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Placa:</label>
                                <input type="text" name="placa" class="form-control" value="<?php echo $veiculo['placa']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>Modelo:</label>
                                <input type="text" name="modelo" class="form-control" value="<?php echo $veiculo['modelo']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>Valor Diaria:</label>
                                <input type="text" name="valor_diaria" class="form-control" value="<?php echo str_replace('.',',', $categoriaV['valor']); ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-md-offset-1">
                            <div>
                                <label>Data Inicio Reserva:</label>
                                <input type="date" name="data_inicio" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div>
                                <label>Data Fim Reserva:</label>
                                <input type="date" name="data_fim" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 botao1 col-md-offset-1">
                            <label></label>
                            <input type="submit" name="reservar" class="btn btn-success btn-block" value="Confirmar" />
                        </div>
                        <div class="col-md-5 botao2">
                            <label></label>
                            <a href="reserva.php" role="button" class="btn btn-warning btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>