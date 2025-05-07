<?php

class ProfCurso extends Model {

    // metodo para pegar todas prof_cursos
    public function getProfCurso(){
        $sql = "SELECT * FROM tbl_prof_curso ORDER BY id_professor ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    
}