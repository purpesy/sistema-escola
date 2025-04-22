<?php

class ContatoController extends Controller{
    public function index(){
        $dados = array();

        $this->carregarViews('contato', $dados);
    }

    public function enviarEmail(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $fone = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_NUMBER_INT);
            $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $status = 'Pendente';

            date_default_timezone_set('America/Sao_Paulo');
            $dataHora = date('Y-m-d H:i:s');

            if(isset($nome) && $email && $msg){
                $contatoModel = new Contato();
                $salvar = $contatoModel->salvarEmail($nome, $email, $fone, $assunto, $msg, $status, $dataHora);
                
            }
        }
    }
}