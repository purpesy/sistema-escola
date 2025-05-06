<?php

class Projeto extends Model
{
    public function postNovoProjeto($titulo, $descricao, $cod_professor, $cod_sigla, $data_inicio, $data_entrega, $status_projeto, $url_projeto)
    {
        // Verificar se já existe um projeto com o mesmo titulo.
        $check_sql = "SELECT COUNT(*) FROM tbl_projeto WHERE titulo_projeto = :titulo";
        $check_stmt = $this->db->prepare($check_sql);
        $check_stmt->bindParam(':titulo', $titulo);
        $check_stmt->execute();
        $existe = $check_stmt->fetchColumn();
        if ($existe > 0) {
            return [
                'success' => false,
                'message' => 'Já existe projeto com esse título.'
            ];
        } else {
            // Inserir novo projeto
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

            if ($stmt->execute()) {
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

    public function postParticipacaoProjeto($cod_projeto, $cod_aluno)
    {
        $sql = "INSERT INTO tbl_participacao_projeto(id_projeto, id_aluno, nota_participacao_projeto, obs_participacao_projeto) VALUES(:id_projeto, :id_aluno, 0, '')";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_projeto', $cod_projeto);
        $stmt->bindParam(':id_aluno', $cod_aluno);
        if ($stmt->execute()) {
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
