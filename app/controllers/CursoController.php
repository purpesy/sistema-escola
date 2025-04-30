<?php

class CursoController extends Controller
{

    private $modelCurso;

    // construct - automaticamente iniciar algo, construir algo automaticamente.
    public function __construct()
    {
        $this->modelCurso = new Curso();
    }

    public function index()
    {
        $dados = array();

        $todosOsCurso = $this->modelCurso->getTodosCursos();

        $dados['cursos'] = $todosOsCurso;

        $this->carregarViews('servicos', $dados);
    }

    public function detalhe($link)
    {
        $dados = array();
        $curso = $this->modelCurso->getTodosCursos();

        foreach ($curso as $linha) {
            if ($this->gerarLinkCurso($linha['nome_curso']) == $link) {
                $dados['curso'] = $linha;
                $dados['titulo'] = $linha['nome_curso'];
                $this->carregarViews('detalhe-curso', $dados);
                return;
            }
        }

    }

    function gerarLinkCurso($link)
    {
        $link = mb_strtolower($link, 'UTF-8');
        $caracter = [
            'á' => 'a',
            'à' => 'a',
            'ã' => 'a',
            'â' => 'a',
            'ä' => 'a',
            'é' => 'e',
            'è' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'í' => 'i',
            'ì' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ó' => 'o',
            'ò' => 'o',
            'õ' => 'o',
            'ô' => 'o',
            'ö' => 'o',
            'ú' => 'u',
            'ù' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ç' => 'c',
            ' ' => '-'
        ];

        $link = strtr($link, $caracter);
        return $link;
    }

    // DASH BOARD ###############

    // metodo para listar os cursos
    public function listar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/curso/listar';

        $this->carregarViews('admin/dash', $dados);
    }
}