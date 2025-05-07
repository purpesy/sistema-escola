<?php

class MatriculasController extends Controller{
    private $modelMatricula;

    // construct - automaticamente iniciar algo, construir algo automaticamente.
    public function __construct()
    {
        $this->modelMatricula = new Matricula();
    }
    
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/matriculas/listar';

        $matricula = $this->modelMatricula->getMatriculas();
        $dados['matricula'] = $matricula;

        $this->carregarViews('admin/dash', $dados);
    }
}