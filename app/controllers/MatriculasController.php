<?php

class MatriculasController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/matriculas/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}