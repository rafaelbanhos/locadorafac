<?php

require_once("inc/conexao.php");

$pdo = Database::conexao();
//$stmt = $pdo->prepare("SELECT * FROM tb_reserva");
//$stmt->execute();
$stmt = $pdo->prepare("SELECT * FROM tb_reserva WHERE id_usuario=:id_usuario");
$stmt->execute(['id_usuario' => $_SESSION['id_usuario']]);
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
            <div class="col-md-7 col-sm-12 col-md-offset-2">
                <h1>Relatório de Reservas</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Usuário</th>
                            <th>ID Veiculo</th>
                            <th>Data Inicio</th>
                            <th>Data Fim</th>
                            <th>Data da Solicitação</th>
                            <th>Valor da Reserva</th>                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $linha) : ?>
                            <tr>
                                <td><?php echo $linha['id_usuario'] ?></td>
                                <td><?php echo $linha['id_veiculo'] ?></td>
                                <td><?php echo $linha['data_inicio'] ?></td>
                                <td><?php echo $linha['data_fim'] ?></td>
                                <td><?php echo $linha['data_solicitacao'] ?></td>
                                <td><?php echo $linha['valor_reserva'] ?></td>
                                <!-- <td><a href="dashboard.php?p=reservar_veiculo.php&id_veiculo=<?php echo $linha['id_veiculo'] ?>" class="btn btn-success">Reservar</a> -->
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>