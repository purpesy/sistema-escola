<?php

class AlunosController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/alunos/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}