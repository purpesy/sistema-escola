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

    public function getAllFuncionarios(){
        $sql = "SELECT * FROM tbl_funcionario WHERE status_funcionario = 'ATIVO' ORDER BY nome_funcionario ASC;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function GetFuncionarioByID($id)
    {
        $sql = "SELECT * FROM tbl_funcionario WHERE status_funcionario = 'Ativo' AND id_funcionario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function patchAtualizarFuncionario($dados, $id)
    {
        $campos = [];
        foreach ($dados as $campo => $valor) {
            $campos[] = "$campo = :$campo";
        }

        $sql = "UPDATE tbl_funcionario SET " . implode(', ', $campos) . ", data_atualizacao_funcionario = NOW() WHERE id_funcionario = :id_funcionario";
        $stmt = $this->db->prepare($sql);

        foreach ($dados as $campo => $valor) {
            $stmt->bindValue(":$campo", $valor); // <- Aqui está a correção
        }

        $stmt->bindValue(':id_funcionario', $id); // Também pode usar bindValue aqui

        return $stmt->execute();
    }


}