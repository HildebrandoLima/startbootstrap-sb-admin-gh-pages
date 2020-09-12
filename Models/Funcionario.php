<?php
// Classe que contém as funções para o crud da aplicação.
include_once "Funcoes.php";

class Funcionario extends Conexao {

    private $con;
    private $obj;
    private $id_funcionario;
    private $nome;
    private $sobre_nome;
    private $email;
    private $senha;
    private $confirmar_senha;
    private $dataCadastro;

    public function __construct() {
        $this->con = new Conexao();
        $this->obj = new Funcoes();
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

	public function selecionaId($dado){
        try{
            $this->id_funcionario = $this->obj->base64($dado, 2);
            $sql = $this->con->conectar()->prepare("SELECT * FROM funcionarios WHERE id_funcionario = :idFunc;");
            $sql->bindParam(":idFunc", $this->id_funcionario, PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetch();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }

    public function listar() {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM funcionarios ORDER BY nome;");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }

	public function contar() {
        try {
            $sql = $this->con->conectar()->prepare("SELECT COUNT(*) AS id_funcionario FROM funcionarios;");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }

	public function inserir($dados) {
        try {
            $this->nome = $this->obj->trataCaracter($dados['nome'], 1);
            $this->sobre_nome = $this->obj->trataCaracter($dados['sobre_nome'], 1);
			$this->email = $dados['email'];
			$this->senha = sha1($dados['senha']);
			$this->confirmar_senha = sha1($dados['confirmar_senha']);
            $this->dataCadastro = $this->obj->dataAtual(2);
            $sql = $this->con->conectar()->prepare("INSERT INTO funcionarios (nome , sobre_nome , email , senha , confirmar_senha , data_cadastro) VALUES (:nome , :sobre_nome , :email , :senha , :confirmar_senha , :dt);");
            $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $sql->bindParam(":sobre_nome", $this->sobre_nome, PDO::PARAM_STR);
            $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
            $sql->bindParam(":senha", $this->senha, PDO::PARAM_STR);
            $sql->bindParam(":confirmar_senha", $this->confirmar_senha, PDO::PARAM_STR);
            $sql->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);
            if($sql->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }

    public function alterar($dados) {
        try {
            $this->id_funcionario = $this->obj->base64($dados['fun'], 2);
            $this->nome = $this->obj->trataCaracter($dados['nome'], 1);
            $this->sobre_nome = $this->obj->trataCaracter($dados['sobre_nome'], 1);
			$this->email = $this->obj->trataCaracter($dados['email'], 1);
            $sql = $this->con->conectar()->prepare("UPDATE funcionarios SET  nome = :nome , sobre_nome = :sobre_nome , email = :email WHERE id_funcionario = :idFunc;");
            $sql->bindParam(":idFunc", $this->id_funcionario, PDO::PARAM_INT);
            $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $sql->bindParam(":sobre_nome", $this->sobre_nome, PDO::PARAM_STR);
			$sql->bindParam(":email", $this->email, PDO::PARAM_STR);
            if($sql->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }

    public function deletar($dado) {
        try {
            $this->id_funcionario = $this->obj->base64($dado, 2);
            $sql = $this->con->conectar()->prepare("DELETE FROM funcionarios WHERE id_funcionario = :idFunc;");
            $sql->bindParam(":idFunc", $this->id_funcionario, PDO::PARAM_INT);
            if($sql->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }
}
