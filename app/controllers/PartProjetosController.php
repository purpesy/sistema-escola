<?php

class PartProjetosController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/partProjetos/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}