<?php

class EmpresasController extends Controller
{

    private $modelEmpresa;

    // construct - automaticamente iniciar algo, construir algo automaticamente.
    public function __construct()
    {
        $this->modelEmpresa = new Empresa();
    }
    public function listar()
    {

        $dados = array();

        $dados['conteudo'] = 'admin/empresas/listar';

        $empresas = $this->modelEmpresa->getEmpresas();
        $dados['empresas'] = $empresas;

        $this->carregarViews('admin/dash', $dados);
    }
    public function criar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/empresas/criar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function editar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/empresas/editar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function desativar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/empresas/desativar';
        $this->carregarViews('admin/dash', $dados);
    }
}
