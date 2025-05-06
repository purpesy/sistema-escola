<?php

class FuncionariosController extends Controller{

    private $modelFuncionario;

    // construct - automaticamente iniciar algo, construir algo automaticamente.
    public function __construct()
    {
        $this->modelFuncionario = new Funcionario();
    }

    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/funcionarios/listar';
        $funcionarios = $this->modelFuncionario->getAllFuncionarios();
        $dados['funcionarios'] = $funcionarios;
        $this->carregarViews('admin/dash', $dados);
    }
}