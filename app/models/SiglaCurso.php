<?php

class SiglaCurso extends Model {

    // metodo para pegar todas SiglaCursos
    public function getSiglaCursos(){
        $sql = "SELECT * FROM tbl_sigla_curso ORDER BY nome_sigla ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    
}