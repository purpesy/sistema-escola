<?php 

class Aluno extends Model {

    public function GetAllAlunos(){
        $sql = "SELECT nome_aluno, data_nasc_aluno, email_aluno, telefone1_aluno, nome_responsavel, email_responsavel, telefone_responsavel from tbl_aluno WHERE status_aluno = 'Ativo' ORDER BY nome_aluno asc";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetAlunosByID($id){
        $sql = "SELECT nome_aluno, data_nasc_aluno, email_aluno, telefone1_aluno, nome_responsavel, email_responsavel, telefone_responsavel FROM tbl_aluno WHERE id_aluno = :id ORDER BY nome_aluno asc";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}