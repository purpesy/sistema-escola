<?php

class EmpresasController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/empresas/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}