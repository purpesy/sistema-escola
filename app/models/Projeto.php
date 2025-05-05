<?php

class Projeto extends Model {
    public function postNovoProjeto($titulo, $descricao, $cod_professor, $cod_sigla, $data_inicio, $data_entrega, $status_projeto, $url_projeto){
        $sql = "INSERT INTO tbl_projeto (
                    titulo_projeto, descricao_projeto, id_professor, id_sigla, 
                    data_inicio_projeto, data_entrega_projeto, status_projeto, url_projeto
                ) VALUES (
                    :titulo, :descricao, :id_professor, :id_sigla, 
                    :data_inicio, :data_entrega, :status_projeto, :url_projeto
                )";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id_professor', $cod_professor);
        $stmt->bindParam(':id_sigla', $cod_sigla);
        $stmt->bindParam(':data_inicio', $data_inicio);
        $stmt->bindParam(':data_entrega', $data_entrega);
        $stmt->bindParam(':status_projeto', $status_projeto);
        $stmt->bindParam(':url_projeto', $url_projeto);

        if($stmt->execute()){
            return [
                'success' => true,
                'id' => $this->db->lastInsertId()
            ];
        } else {
            return [
                'success' => false,
                'error' => $stmt->errorInfo()
            ];
        }
    }
}
