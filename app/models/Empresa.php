<?php

class Empresa extends Model {

    // metodo para pegar todas empresas
    public function getEmpresas(){
        $sql = "SELECT * FROM tbl_empresa ORDER BY fantasia_empresa ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    
}