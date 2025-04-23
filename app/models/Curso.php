<?php

class Curso extends Model {
    // metodo para pegar 6 cursos aleatorios
    public function getCursoRand($limite = 6){
        $sql = "SELECT * FROM tbl_curso ORDER BY RAND() LIMIT :qtd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':qtd', (int)$limite, PDO::PARAM_INT); 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    // metodo para pegar todos os cursos
    public function getTodosCursos(){
        $sql = "SELECT * FROM tbl_curso WHERE status_curso = 'Ativo' ORDER BY nome_curso ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    // metodo para pegar um curso pelo NOME
    public function getCursoBynome($nome){
        $sql = "SELECT * FROM tbl_curso WHERE nome_curso LIKE :nome";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':nome' => "$nome%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    
}