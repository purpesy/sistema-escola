<?php

class Nota extends Model {

    // metodo para pegar todas Notas
    public function getNotas(){
        $sql = "SELECT * FROM tbl_nota ORDER BY id_matricula ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    
}