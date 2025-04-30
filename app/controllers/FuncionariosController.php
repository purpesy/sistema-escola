<?php

class FuncionariosController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/funcionarios/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}