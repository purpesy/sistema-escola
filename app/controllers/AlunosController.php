<?php

class AlunosController extends Controller
{

    private $modelAluno;

    // construct - automaticamente iniciar algo, construir algo automaticamente.
    public function __construct()
    {
        $this->modelAluno = new Aluno();
    }

    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/alunos/listar';
        $alunos = $this->modelAluno->GetAllAlunos();
        $dados['alunos'] = $alunos;
        $this->carregarViews('admin/dash', $dados);
    }
    public function criar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/alunos/criar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function editar($id)
    {
        $dados = array();
        $aluno = $this->modelAluno->GetAlunosByID($id);
        $dados['aluno'] = $aluno;
        $dados['conteudo'] = 'admin/alunos/editar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function desativar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/alunos/desativar';
        $this->carregarViews('admin/dash', $dados);
    }
}
