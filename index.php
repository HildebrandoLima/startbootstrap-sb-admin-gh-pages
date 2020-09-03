<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> SB Admin - Painel de Controle </title>
	<!-- Icone na aba do navegador -->
	<link rel="shortcut icon" href="Template/img/gráfico-circular.png">
    <!-- Bootstrap core CSS-->
    <link rel="stylesheet" type="text/css" href="Template/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="Template/vendor/fontawesome-free/css/all.min.css">
    <!-- Page level plugin CSS-->
    <link rel="stylesheet" type="text/css" href="Template/vendor/datatables/dataTables.bootstrap4.css">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" type="text/css" href="Template/css/sb-admin.css">
  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="Index"> Logo </a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </nav>

    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="Index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> Menu </span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span> Páginas </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header"> Login Screens: </h6>
            <a class="dropdown-item" href="Login"> Login </a>
            <a class="dropdown-item" href="Registrar"> Registrar </a>
            <a class="dropdown-item" href="EsqueceuSenha"> Esqueceu sua Senha </a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header"> Outras Páginas: </h6>
            <a class="dropdown-item" href="Error404"> Página 404 </a>
            <a class="dropdown-item" href="Blank"> Página em Branco </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://projeto-mvc.6te.net/Index">
            <i class="fas fa-fw fa-chart-area"></i>
            <span> Veja meu Projeto em Produção </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Charts">
            <i class="fas fa-fw fa-chart-area"></i>
            <span> Gáficos </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Tables">
            <i class="fas fa-fw fa-table"></i>
            <span> Tabela de Dados </span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-table"></i>
            <span> Sair </span></a>
        </li>
      </ul>

<?php
	//	Redenriza o corpo da página.
	require_once('Ocultarerros.php');
	require_once('Rotas.php');

	function __autoload($class_name) {
		if(file_exists('./Models/' . $class_name . '.php')) {
			require_once './Models/' . $class_name . '.php';
		} elseif(file_exists('./Controllers/' . $class_name . '.php')) {
			require_once './Controllers/' . $class_name . '.php';
		}
	}
?>

	<!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span> Copyright © Todos os diretos rezervados 2020 | Sitema desenvolvido pela WebTec - Hildebrando Alves </span>
            </div>
          </div>
        </footer>
      </div>
      <!-- /.content-wrapper -->
	</div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Tem certeza que desej sair? </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"> × </span>
            </button>
          </div>
          <div class="modal-body"> Selecione "Sim" para sair ou cancelar para fechar esta tela. </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"> Cancelar </button>
            <a class="btn btn-primary" href="login.html"> Sair </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="Template/vendor/jquery/jquery.min.js"></script>
    <script src="Template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="Template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="Template/vendor/chart.js/Chart.min.js"></script>
    <script src="Template/vendor/datatables/jquery.dataTables.js"></script>
    <script src="Template/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="Template/js/sb-admin.min.js"></script>
    <!-- Demo scripts for this page-->
    <script src="Template/js/demo/datatables-demo.js"></script>
    <script src="Template/js/demo/chart-area-demo.js"></script>
  </body>
</html>
