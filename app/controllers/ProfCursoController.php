<?php

class ProfCursoController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/profCurso/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}