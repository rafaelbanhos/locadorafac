<?php
session_start();
require_once('inc/conexao.php');

if (!isset($_SESSION['login']) && !isset($_SESSION['senha'])) :
  header("Location: index.php");
endif;

$pdo = Database::conexao();
$stmt = $pdo->prepare("SELECT * FROM tb_usuario WHERE id_usuario=:id_usuario");
$stmt->execute(['id_usuario' => $_SESSION['id_usuario']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$perfil = $user['Perfil'];


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Página Principal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Inclua o acima em sua tag HEAD ---------->

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="css/simple-sidebar.css" />
</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">

      <div class="sidebar-heading">Olá, <?php echo $_SESSION['nome'] ?> <a href="inc/logout.php"><i class="fa fa-times-circle-o fa-lg"></a></i></div>
      <div class="list-group list-group-flush">
      <?php   if($perfil == 3){ ?>
        <a href="http://localhost/locadora/dashboard.php?p=usuarios.php" class="list-group-item list-group-item-action bg-light">Usuários</a>
        <a href="http://localhost/locadora/dashboard.php?p=veiculos.php" class="list-group-item list-group-item-action bg-light">Veículos</a>
        <a href="http://localhost/locadora/dashboard.php?p=reserva.php" class="list-group-item list-group-item-action bg-light">Reserva</a>
        <a href="http://localhost/locadora/dashboard.php?p=categorias.php" class="list-group-item list-group-item-action bg-light">Categorias</a>
        <a href="http://localhost/locadora/dashboard.php?p=relatorio.php" class="list-group-item list-group-item-action bg-light">Relatórios</a>
      <?php } else { ?>
        <a href="http://localhost/locadora/dashboard.php?p=reserva.php" class="list-group-item list-group-item-action bg-light">Reserva</a>
        <a href="http://localhost/locadora/dashboard.php?p=minhasreservas.php" class="list-group-item list-group-item-action bg-light">Minhas Reservas</a>
      <?php } ?>  
      </div>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inc/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>


      </nav>

      <div class="container-fluid" id="conteudo">
        <!--<h1 class="mt-4">Página em construção</h1>
            <p>Locadora RMGD. Em construção.</p>
            <p>Desculpe o incômodo, voltaremos em breve!</p>
--><?php if (isset($_GET['p'])) {
      include($_GET['p']);
    } else {
      echo "<h1 class='col-md-8 col-sm-12 col-md-offset-1'>Sistema Locadora de Carros</h1>
          <h4 class='col-md-8 col-sm-12 col-md-offset-1'>Trabalho Programação para Internet - Prof. Andre Wescley</h4>
          <p class='col-md-8 col-sm-12 col-md-offset-1'>Equipe: <br>- George Paiva<br> - Marcelo Bastos<br> - Rafael Banhos<br> - Leonardo<br> - Dácio</p>";
    }
    ?>
      </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>

</html>