<?php

class SiglaCursoController extends Controller{
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/siglaCurso/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}