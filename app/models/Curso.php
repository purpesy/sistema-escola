<?php

class Curso extends Model
{
    // metodo para pegar 6 cursos aleatorios
    public function getCursoRand($limite = 6)
    {
        $sql = "SELECT * FROM tbl_curso ORDER BY RAND() LIMIT :qtd";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':qtd', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // metodo para pegar todos os cursos
    public function getTodosCursos()
    {
        $sql = "SELECT * FROM tbl_curso WHERE status_curso = 'Ativo' ORDER BY nome_curso ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCursoByID($id)
    {
        $sql = "SELECT * FROM tbl_curso WHERE status_curso = 'Ativo' AND id_curso = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // metodo para pegar um curso pelo NOME
    public function getCursoBynome($nome)
    {
        $sql = "SELECT * FROM tbl_curso WHERE nome_curso LIKE :nome and status_curso = 'Ativo'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':nome' => "$nome%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function patchAtualizarCurso($dados, $id)
    {
        $campos = [];
        $parametros = [];
        foreach ($dados as $campo => $valor) {
            if (!empty($valor)) {
                $campos[] = "$campo = :$campo";
                $parametros[":$campo"] = $valor;
            }
        }
        if (empty($campos)) {
            return false;
        }
        // Adiciona campo de atualização
        $campos[] = "data_atualizacao_curso = NOW()";
        // Adiciona o ID
        $parametros[':id_curso'] = $id;
        // Monta a query
        $sql = "UPDATE tbl_curso SET " . implode(', ', $campos) . " WHERE id_curso = :id_curso";
        $stmt = $this->db->prepare($sql);
        // Faz o bind dos parâmetros
        foreach ($parametros as $campo => $valor) {
            $stmt->bindValue($campo, $valor);
        }
        return $stmt->execute();
    }
}
