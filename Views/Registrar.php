<?php
require_once 'Models/Funcionario.php';
require_once 'Models/Funcoes.php';

$objFun = new Funcionario();
$objFcs = new Funcoes();

if(isset($_POST['btCadastrar'])) {
    if($objFun->inserir($_POST) == 'ok') {
		echo "<script> alert('Informações Enviadas com Sucesso.'); window.location='http://projeto-mvc.6te.net/Registrar'</script>";
    } else {
		echo "<script> alert('Erro ao Cadastrar.'); window.location='http://projeto-mvc.6te.net/Registrar'</script>";
    }
}
?>

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header"> Registrar uma Conta </div>
        <div class="card-body">
          <form method="POST" action="">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="nome" id="Nome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus">
                    <label for="Nome"> Nome </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" name="sobre_nome" id="SobreNome" class="form-control" placeholder="SobreNome" required="required">
                    <label for="SobreNome"> Sobre Nome </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="email" id="Email" class="form-control" placeholder="Endereço de e-mail" required="required">
                <label for="Email"> Endereço de e-mail </label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="senha" id="Senha" class="form-control" placeholder="Senha" required="required">
                    <label for="Senha"> Senha </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="confirmar_senha" id="Confirmarsenha" class="form-control" placeholder="Confirmarsenha" required="required">
                    <label for="Confirmarsenha"> Confirmarsenha </label>
                  </div>
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="btCadastrar" value="Cadastrar">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="Index"> Voltar </a>
          </div>
        </div>
      </div>
    </div>

