<?php

class EmpresasController extends Controller
{

    private $modelEmpresa;

    // construct - automaticamente iniciar algo, construir algo automaticamente.
    public function __construct()
    {
        $this->modelEmpresa = new Empresa();
    }
    public function listar()
    {

        $dados = array();

        $dados['conteudo'] = 'admin/empresas/listar';

        $empresas = $this->modelEmpresa->getEmpresas();
        $dados['empresas'] = $empresas;

        $this->carregarViews('admin/dash', $dados);
    }

   public function criar()
{
    $dados = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Pegando os dados do formulário com validação/sanitização
        $nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $fantasia_empresa = filter_input(INPUT_POST, 'fantasia_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo_empresa = filter_input(INPUT_POST, 'tipo_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $cnpj_empresa = filter_input(INPUT_POST, 'cnpj_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $inscr_est_empresa = filter_input(INPUT_POST, 'inscr_est_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $email_empresa = filter_input(INPUT_POST, 'email_empresa', FILTER_SANITIZE_EMAIL);
        $telefone1_empresa = filter_input(INPUT_POST, 'telefone1_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $cep_empresa = filter_input(INPUT_POST, 'cep_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $endereco_empresa = filter_input(INPUT_POST, 'endereco_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $numero_empresa = filter_input(INPUT_POST, 'numero_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $complemento_empresa = filter_input(INPUT_POST, 'complemento_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $bairro_empresa = filter_input(INPUT_POST, 'bairro_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade_empresa = filter_input(INPUT_POST, 'cidade_empresa', FILTER_SANITIZE_SPECIAL_CHARS);
        $estado_empresa = filter_input(INPUT_POST, 'estado_empresa', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($nome_empresa && $cnpj_empresa && $email_empresa) {
            $dadosEmpresa = array(
                'nome_empresa' => $nome_empresa,
                'fantasia_empresa' => $fantasia_empresa,
                'tipo_empresa' => $tipo_empresa,
                'cnpj_empresa' => $cnpj_empresa,
                'inscr_est_empresa' => $inscr_est_empresa,
                'email_empresa' => $email_empresa,
                'telefone1_empresa' => $telefone1_empresa,
                'cep_empresa' => $cep_empresa,
                'endereco_empresa' => $endereco_empresa,
                'numero_empresa' => $numero_empresa,
                'complemento_empresa' => $complemento_empresa,
                'bairro_empresa' => $bairro_empresa,
                'cidade_empresa' => $cidade_empresa,
                'estado_empresa' => $estado_empresa
            );

            $this->modelEmpresa->criarEmpresa($dadosEmpresa);

            $_SESSION['mensagem'] = 'Empresa cadastrada com sucesso.';
            $_SESSION['tipoMsg'] = 'success';
            header('Location: ' . URL_BASE . 'empresa/listar');
            exit;
        } else {
            $dados['mensagem'] = 'Preencha os campos obrigatórios.';
            $dados['tipoMSG'] = 'erro';
        }
    }

    $dados['conteudo'] = 'admin/empresas/criar';
    $this->carregarViews('admin/dash', $dados);
}


    public function editar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/empresas/editar';
        $this->carregarViews('admin/dash', $dados);
    }

    public function desativar()
    {
        $dados = array();

        $dados['conteudo'] = 'admin/empresas/desativar';
        $this->carregarViews('admin/dash', $dados);
    }
}
