<?php

class Funcionario extends Model {
    
    public function getDadosFuncionarios(){
        $sql = "SELECT nome_funcionario, email_funcionario, telefone1_funcionario, cargo_funcionario FROM tbl_funcionario WHERE status_funcionario = 'ATIVO' AND cargo_funcionario LIKE 'Professor%' OR cargo_funcionario LIKE 'Coordenador%' ORDER BY cargo_funcionario AND nome_funcionario;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    } 

    public function getFuncionariosCargo($cargo){
        $sql = "SELECT nome_funcionario, email_funcionario, telefone1_funcionario FROM tbl_funcionario WHERE status_funcionario = 'ATIVO' AND cargo_funcionario LIKE :cargo ORDER BY nome_funcionario ASC;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':cargo' => "$cargo%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    } 


}