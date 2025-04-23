<?php

class Empresa extends Model {

    // metodo para pegar todas empresas
    public function getEmpresas(){
        $sql = "SELECT fantasia_empresa, email_empresa, telefone1_empresa, endereco_empresa, numero_empresa, complemento_empresa, bairro_empresa FROM tbl_empresa ORDER BY fantasia_empresa ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    
}