<?php

class NotasController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/notas/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}