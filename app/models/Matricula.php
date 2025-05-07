<?php

class Matricula extends Model {

    // metodo para pegar todas matriculas
    public function getMatriculas(){
        $sql = "SELECT * FROM tbl_matricula ORDER BY id_aluno ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    
}