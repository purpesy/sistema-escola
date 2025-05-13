<h1 class="text-center mt-5">Criar Curso</h1>

<div class="container-fluid px-5 mt-4">
    <form action="#" method="POST" enctype="multipart/form-data" class="p-5 rounded-4 shadow bg-white">
        <div class="text-center mb-5">
            <label for="foto_curso" style="cursor: pointer;">
                <img id="img-form" src="https://escola.360criativo.com.br/upload/sem-foto.jpg" alt="Foto do curso"
                    class="rounded border shadow" style="width: 250px; transition: 0.3s;">
            </label>
            <input type="file" id="foto_curso" name="foto_curso" style="display: none;" accept="image/*">
            <p class="text-muted mt-2">Clique na imagem para selecionar uma foto</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Nome do curso:</label>
                <input type="text" name="nome_curso" class="form-control form-control-lg" placeholder="Digite o nome do curso" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Descrição do curso:</label>
                <input type="text" name="descricao_curso" class="form-control form-control-lg" placeholder="Digite a descrição do curso" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pré-requisitos do curso:</label>
                <input type="text" name="pre_requisito_curso" class="form-control form-control-lg" placeholder="Digite os pré-requisitos" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Valor do curso (R$):</label>
                <input type="number" name="valor_curso" class="form-control form-control-lg" placeholder="Digite o valor" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Carga horária (horas):</label>
                <input type="number" name="carga_horaria_curso" class="form-control form-control-lg" placeholder="Horas" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Nível do curso:</label>
                <select name="nivel_curso" class="form-select form-select-lg" required>
                    <option value="" disabled selected>Selecione o nível</option>
                    <option value="tecnico">Técnico</option>
                    <option value="tecnologo">Tecnólogo</option>
                    <option value="graduacao">Graduação</option>
                    <option value="pos">Pós graduação</option>
                    <option value="livre">Livre</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Modalidade do curso:</label>
                <select name="modalidade_curso" class="form-select form-select-lg" required>
                    <option value="" disabled selected>Selecione a modalidade</option>
                    <option value="hibrido">Híbrido</option>
                    <option value="presencial">Presencial</option>
                    <option value="online">Online</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Área do curso:</label>
                <select name="area_curso" class="form-select form-select-lg" required>
                    <option value="" disabled selected>Selecione a área</option>
                    <option value="tecnologia">Tecnologia</option>
                    <option value="design">Design</option>
                    <option value="marketing">Marketing</option>
                    <option value="engenharia">Engenharia</option>
                    <option value="saude">Saúde</option>
                    <option value="administracao">Administração</option>
                    <option value="educacao">Educação</option>
                    <option value="financas">Finanças</option>
                    <option value="direito">Direito</option>
                    <option value="gastronomia">Gastronomia</option>
                </select>
            </div>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-success btn-lg w-100 fw-semibold">
                <i class="bi bi-check-circle-fill me-2"></i>Cadastrar Curso
            </button>
        </div>
    </form>
</div>
