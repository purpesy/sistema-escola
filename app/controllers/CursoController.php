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

        $todosOsCurso = $this->modelCurso->getTodosCursosAtivos();

        $dados['cursos'] = $todosOsCurso;

        $this->carregarViews('servicos', $dados);
    }

    public function detalhe($link)
    {
        $dados = array();
        $curso = $this->modelCurso->getTodosCursosAtivos();

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

        $cursos = $this->modelCurso->getTodosCursos();
        $dados['cursos'] = $cursos;
        $this->carregarViews('admin/dash', $dados);
    }

    public function criar()
    {
        $dados = array();
        // 1 chamada do botao novo curso.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // 2 pegar os dados do form
            $nome_curso = filter_input(INPUT_POST, 'nome_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_curso = filter_input(INPUT_POST, 'descricao_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $pre_requisito_curso = filter_input(INPUT_POST, 'pre_requisito_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor_curso = filter_input(INPUT_POST, 'valor_curso', FILTER_SANITIZE_NUMBER_FLOAT);
            $carga_horaria_curso = filter_input(INPUT_POST, 'carga_horaria_curso', FILTER_SANITIZE_NUMBER_INT);
            $area_curso = filter_input(INPUT_POST, 'area_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $nivel_curso = filter_input(INPUT_POST, 'nivel_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $modalidade_curso = filter_input(INPUT_POST, 'modalidade_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $alt_curso = $nome_curso;
            date_default_timezone_set('America/Sao_Paulo');
            $data_criacao_curso = date('y-m-d H:i:s');
            $data_atualizacao_curso = date('y-m-d H:i:s');
            $status_curso = 'Pendente';

            if ($nome_curso && $nivel_curso && $carga_horaria_curso) {
                $dadosCurso = array(
                    'nome_curso' => $nome_curso,
                    'descricao_curso' => $descricao_curso,
                    'pre_requisito_curso' => $pre_requisito_curso,
                    'valor_curso' => $valor_curso,
                    'carga_horaria_curso' => $carga_horaria_curso,
                    'area_curso' => $area_curso,
                    'nivel_curso' => $nivel_curso,
                    'modalidade_curso' => $modalidade_curso,
                    'alt_curso' => $alt_curso,
                    'data_criacao_curso' => $data_criacao_curso,
                    'data_atualizacao_curso' => $data_atualizacao_curso,
                    'status_curso' => $status_curso
                );
                $id_curso = $this->modelCurso->addCurso($dadosCurso);
                if ($id_curso) {
                    if (isset($_FILES['foto_curso']) && $_FILES['foto_curso']['error'] == 0) {
                        $arquivo = $this->uploadFoto($_FILES['foto_curso'], $id_curso, $nome_curso);
                        if ($arquivo) {
                            // atualizar a foto na base de dados do ultimo id do curso adicionado
                            $this->modelCurso->atualizarFoto($id_curso, $arquivo);
                        } else {
                            $dados['mensagem'] = 'Erro ao fazer upload da foto.';
                            $dados['tipoMSG'] = 'Erro';
                        }
                    }

                    $_SESSION['mensagem'] = 'Curso adicionado com Sucesso';
                    $_SESSION['tipoMsg'] = 'success';
                    header('Location: ' . URL_BASE . 'curso/listar');
                    exit;
                }
            }
        }
        $dados['conteudo'] = 'admin/curso/criar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function uploadFoto($file, $id, $nome)
    {
        $dir = 'upload/curso';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $novoNome = $id . '_' . $this->gerarLinkCurso($nome) . '.' . $ext;
        if (move_uploaded_file($file['tmp_name'], $dir . '/' . $novoNome)) {
            return $novoNome;
        } else {
            $novoNome = 'sem-foto.jpg';
            return $novoNome;
        }
    }

    public function editar($id)
    {
        $dados = array();
        $carregarDadosCurso = $this->modelCurso->carregarDados($id);

        
        $dados['conteudo'] = 'admin/curso/editar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function publicar(){
        $id = filter_input(INPUT_POST, 'id_curso', FILTER_SANITIZE_NUMBER_INT);
        $this->modelCurso->publicarCurso($id);

        $_SESSION['mensagem'] = 'Curso publicado com sucesso';
        $_SESSION['tipoMsg'] = 'success';
        header('Location: ' . URL_BASE . 'curso/listar');
        exit;
    }

    public function desativar(){
        $id = filter_input(INPUT_POST, 'id_curso', FILTER_SANITIZE_NUMBER_INT);
        $this->modelCurso->desativarCurso($id);

        $_SESSION['mensagem'] = 'Curso desativado com sucesso';
        $_SESSION['tipoMsg'] = 'success';
        header('Location: ' . URL_BASE . 'curso/listar');
        exit;
    }
}
