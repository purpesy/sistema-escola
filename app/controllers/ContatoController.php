<?php

class ContatoController extends Controller{
    public function index(){
        $dados = array();

        $this->carregarViews('contato', $dados);
    }
}