<?php

class ProjetosController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/projetos/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}