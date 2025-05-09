<?php

class Aluno extends Model
{

    public function GetAllAlunos()
    {
        $sql = "SELECT * FROM tbl_aluno WHERE status_aluno = 'Ativo' ORDER BY nome_aluno asc";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetAlunosByID($id)
    {
        $sql = "SELECT * FROM tbl_aluno WHERE status_aluno = 'Ativo' AND id_aluno = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function patchAtualizarAluno($dados, $id)
    {
        $campos = [];
        foreach ($dados as $campo => $valor) {
            $campos[] = "$campo = :$campo";
        }

        $sql = "UPDATE tbl_aluno SET " . implode(', ', $campos) . ", data_atualizacao_aluno = NOW() WHERE id_aluno = :id_aluno";
        $stmt = $this->db->prepare($sql);

        foreach ($dados as $campo => $valor) {
            $stmt->bindValue(":$campo", $valor); // <- Aqui está a correção
        }

        $stmt->bindValue(':id_aluno', $id); // Também pode usar bindValue aqui

        return $stmt->execute();
    }
}
