<?php 
//include('dashboard.php');
require_once("inc/conexao.php");

$pdo=Database::conexao();
$stmt = $pdo->prepare("SELECT * FROM `tb_veiculo`");
$stmt->execute(); 
$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/veiculos.css" />

</head>

<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-7 col-sm-12 col-md-offset-4">
                <h1>Veiculos</h1>
                <hr>
            </div>
        </div>



        <div class="row">
            <div class="col-md-7 col-md-offset-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Placa</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Cor</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $linha): ?>
                        <tr>
                            <td><?php echo $linha['id_veiculo'] ?></td>
                            <td><?php echo $linha['placa'] ?></td>
                            <td><?php echo $linha['modelo'] ?></td>
                            <td><?php echo $linha['marca'] ?></td>
                            <td><?php echo $linha['cor'] ?></td>
                            <td><?php echo $linha['id_categoria'] ?></td>
                            <td><?php echo $linha['situacao'] ?></td>
                            <td>
                                <a href="veiculo-alterar.php?id_veiculo=<?php echo $linha['id_veiculo'] ?>"
                                    class="btn btn-xs btn-info"><span class="glyphicon glyphicon-cog"></span></a>
                                <a href="inc/excluir-veiculo.php?id_veiculo=<?php echo $linha['id_veiculo']?>"
                                    class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-3 col-sm-12 col-md-offset-4">
            <a href="veiculo-criar.php" class="btn btn-info btn-block" id="insert">Cadastrar Veiculo</a>
        </div>
    </div>
    </div>
</body>

</html>