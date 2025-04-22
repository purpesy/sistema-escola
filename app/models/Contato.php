<?php

class Contato extends Model {
    public function salvarEmail($nome, $email, $fone, $assunto, $msg, $status, $dataHora){
        $sql = "INSERT INTO tbl_contato (nome_Contato, email_Contato, telefone_Contato, assunto_Contato, mensagem_Contato, status_Contato, dataHora_Contato) VALUES (:nome, :email, :fone, :assunto, :msg, :status_contato, :dataHora)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':fone', $fone);
        $stmt->bindValue(':assunto', $assunto);
        $stmt->bindValue(':msg', $msg);
        $stmt->bindValue(':status', $status);
        $stmt->bindValue(':dataHora', $dataHora);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }

    }

}