<?php
require_once 'Models/Funcionario.php';
require_once 'Models/Funcoes.php';

$objFun = new Funcionario();
$objFcs = new Funcoes();

if(isset($_POST['btAlterar'])) {
    if($objFun->queryUpdate($_POST) == 'ok') {
        header('location: ?acao=edit&fun='.$objFcs->base64($_POST['fun'],1));
    } else {
        echo "<script> alert('Erro ao Editar.'); window.location='/startbootstrap-sb-admin-gh-pages/Registrar'</script>";
    }
}

if(isset($_GET['acao'])) {
    switch($_GET['acao']) {
        case 'edit': $fun = $objFun->querySeleciona($_GET['fun']); break;
        case 'delet':
            if($objFun->queryDelete($_GET['fun']) == 'ok') {
                echo "<script> alert('Informações Removidas com Sucesso.'); window.location='/startbootstrap-sb-admin-gh-pages/Registrar'</script>";
            } else {
                echo "<script> alert('Erro ao Remover Dados.'); window.location='/startbootstrap-sb-admin-gh-pages/Registrar'</script>";
            }
            break;
    }
}
?>

	<div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> Painel de Controle </a>
            </li>
            <li class="breadcrumb-item active"> Visão geral </li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><?php //foreach($objFun->queryCount() as $exibir){ echo $exibir['id_funcionario']; } ?> New Messages! </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left"> View Details </span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><?php //foreach($objFun->queryCount() as $exibir){ echo $exibir['id_funcionario']; } ?> New Tasks! </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left"> View Details </span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5"><?php //foreach($objFun->queryCount() as $exibir){ echo $exibir['id_funcionario']; } ?> New Orders! </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left"> View Details </span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><?php //foreach($objFun->queryCount() as $exibir){ echo $exibir['id_funcionario']; } ?> New Tickets! </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left"> View Details </span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Tabela de Dados </div>
            <div class="card-body">
              <div class="table-responsive">
				<!--
				Rever código
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				 <thead>
                    <tr>
                      <th> Nome </th>
                      <th> Sobre Nome </th>
                      <th> E-mail </th>
                      <th> - </th>
                    </tr>
                  </thead>
				  <tbody>
					<td><form action="" method="POST">
						<input type="text" name="nome" id="Nome" class="form-control" value="<?=$objFcs->trataCaracter((isset($fun['nome']))?($fun['nome']):(''), 2)?>" required="required"></td>
						<td><input type="text" name="sobre_nome" id="SobreNome" class="form-control" value="<?=$objFcs->trataCaracter((isset($fun['sobre_nome']))?($fun['sobre_nome']):(''), 2)?>" required="required"></td>
						<td><input type="text" name="email" id="Email" class="form-control" value="<?=$objFcs->trataCaracter((isset($fun['email']))?($fun['email']):(''), 2)?>" required="required"></td>
						<td><input type="submit" name="<?=(isset($_GET['acao']) == 'edit')?('btAlterar'):('btCadastrar')?>" value="<?=(isset($_GET['acao']) == 'edit')?('Alterar'):('Cadastrar')?>">
						<input type="hidden" name="fun" value="<?=(isset($fun['id_funcionario']))?($objFcs->base64($fun['id_funcionario'], 1)):('')?>">
					</form></td>
				  </tbody>
				</table> -->

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> Nome </th>
                      <th> Sobre Nome </th>
                      <th> E-mail </th>
                      <th> Data de Cadastro </th>
                      <th> Editar </th>
                      <th> Remover </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th> Nome </th>
                      <th> Sobre Nome </th>
                      <th> E-mail </th>
                      <th> Data de Cadastro </th>
                      <th> Editar </th>
                      <th> Remover </th>
                    </tr>
                  </tfoot>
                  <tbody>
					<tr>
						<td><form method="POST" action="">
						<input type="text" name="nome" id="Nome" class="form-control" placeholder="Nome" value="<?=$objFcs->trataCaracter((isset($fun['nome']))?($fun['nome']):(''), 2)?>" required="required"></td>
						<td><input type="text" name="sobre_nome" id="SobreNome" class="form-control" placeholder="Sobre Nome" value="<?=$objFcs->trataCaracter((isset($fun['sobre_nome']))?($fun['sobre_nome']):(''), 2)?>" required="required"></td>
						<td><input type="text" name="email" id="Email" class="form-control" placeholder="E-mail" value="<?=$objFcs->trataCaracter((isset($fun['email']))?($fun['email']):(''), 2)?>" required="required"></td>
						<td><input type="text" name="data_cadastro" id="Datacadastro" class="form-control" value="<?=$objFcs->trataCaracter((isset($fun['data_cadastro']))?($fun['data_cadastro']):(''), 2)?>" placeholder="Data de Cadastro" required="required"></td>
						<td></td>
						<td><input type="submit" name="btAlterar" value="Alterar" class="btn btn-primary btn-block">
						<input type="hidden" name="fun" value="<?=(isset($fun['id_funcionario']))?($objFcs->base64($fun['id_funcionario'], 1)):('')?>">
						</form></td>
					</tr>
					<?php foreach($objFun->querySelect() as $exibir) { ?>
					<tr>
						<td><?=$objFcs->trataCaracter($exibir['nome'], 2)?></td>
						<td><?=$objFcs->trataCaracter($exibir['sobre_nome'], 2)?></td>
						<td><?=$objFcs->trataCaracter($exibir['email'], 2)?></td>
						<td><?=$objFcs->trataCaracter($exibir['data_cadastro'], 2)?></td>
						<td><a href="?acao=edit&fun=<?=$objFcs->base64($exibir['id_funcionario'], 1)?>" title="Editar dados"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg></a></td>
						<td><a href="?acao=delet&fun=<?=$objFcs->base64($exibir['id_funcionario'], 1)?>" title="Excluir esse dado"><svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
						<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
						</svg></a></td>
					</tr>
					<?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"> Updated yesterday at 11:59 PM </div>
          </div>
        </div>
        <!-- /.container-fluid -->