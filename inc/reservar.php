<?php 
require_once('conexao.php');
session_start();


$status = "R";
$id_usuario = $_SESSION['id_usuario'];
$id_veiculo = $_GET['id_veiculo'];

$data_inicio = $_GET['data_inicio'];
$data_fim = $_GET['data_fim'];
$data_solicitacao = date('Y-m-d');

$data_checkin = $data_inicio;
$data_ckeckout = $data_fim; 
$valor_pago = 0; 

//Calculos de Taxas
$dias = date_diff(date_create($data_fim), date_create($data_inicio))->format('%d');
$valorDiaria = (double) str_replace(',','.', $_GET['valor_diaria']);
$valor_reserva = $valorDiaria * $dias;




try{
    $pdo=Database::conexao();
    $stmt = $pdo->prepare('INSERT INTO tb_reserva (id_usuario, data_inicio, data_fim, data_solicitacao, data_checkin, data_ckeckout, valor_reserva, valor_pago, status) VALUES (:id_usuario, :data_inicio, :data_fim, :data_solicitacao, :data_checkin, :data_ckeckout, :valor_reserva, :valor_pago, :status)');
    $stmt->execute(array(
        ':id_usuario' => $_SESSION["id_usuario"],
        ':data_inicio' => $data_inicio,
        ':data_fim' => $data_fim,
        ':data_solicitacao' => $data_solicitacao,
        ':data_checkin' => $data_checkin,
        ':data_ckeckout' => $data_ckeckout,
        ':valor_reserva' => $valor_reserva,
        ':valor_pago' => $valor_pago,
        ':status' => $status,

    ));

    // $pdo=Database::conexao();
    // $att = $pdo->prepare('UPDATE tb_veiculo SET status = :status WHERE id_veiculo = :id_veiculo');
    // $att->bindParam(':id_veiculo', $id_veiculo);  
    // $att->bindParam(':status', $status); 
    // $att->execute();

    $mensagem = 'Reserva realizada com sucesso!';
    $location = 'http://localhost/locadora/dashboard.php?p=reserva.php';

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
