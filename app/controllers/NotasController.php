<?php

class NotasController extends Controller{
    private $modelNotas;

    public function __construct()
    {
        $this->modelNotas = new Nota();
    }

    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/notas/listar';
        $notas = $this->modelNotas->getNotas();
        $dados['notas'] = $notas;

        $this->carregarViews('admin/dash', $dados);
    }
    public function criar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/notas/criar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function editar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/notas/editar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function desativar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/notas/desativar';
        $this->carregarViews('admin/dash', $dados);
    }
}