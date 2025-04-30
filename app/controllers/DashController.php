<?php

class DashController extends Controller{
    public function index(){
        // era para Verificar se o usuário está logado, se é ou não admin, porém não temos login ainda
        $dados = array();
        $dados['titulo'] = 'Dashboard SISTEMA ESCOLA';
        $this->carregarViews('admin/dash', $dados);
    }   
}