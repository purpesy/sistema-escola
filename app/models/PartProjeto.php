<?php

class PartProjeto extends Model {

    // metodo para pegar todas PartProjetos
    public function getParticipacoes(){
        $sql = "SELECT * FROM tbl_participacao_projeto ORDER BY id_projeto ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    
}