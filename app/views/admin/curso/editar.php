<h1>Editar Curso</h1>
<p>Preencha apenas os campos que realmente quer editar do curso.</p>

<?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 'true'): ?>
    <script>
        alert("Curso atualizado com sucesso!");
    </script>
<?php endif; ?>


<?php foreach ($curso as $linha): ?>
    <form action="<?= URL_BASE ?>curso/AtualizarCurso/<?= $linha['id_curso'] ?>" method="POST">
        <input type="hidden" name="_method" value="PATCH"> <!-- se estiver usando método via POST com spoof -->
        <table class="table">
            <thead>
                <tr>
                    <th>Campo</th>
                    <th>Atual</th>
                    <th>Novo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nome</td>
                    <td><?= $linha['nome_curso'] ?></td>
                    <td><input type="text" name="nome_curso" class="form-control" placeholder="Novo nome"></td>
                </tr>
                <tr>
                    <td>Nivel</td>
                    <td><?= $linha['nivel_curso'] ?></td>
                    <td><input type="text" name="nivel_curso" class="form-control" placeholder="Novo nivel"></td>
                </tr>
                <tr>
                    <td>Carga Horária</td>
                    <td><?= $linha['carga_horaria_curso'] ?></td>
                    <td><input type="text" name="carga_horaria_curso" class="form-control" placeholder="Nova Carga Horária"></td>
                </tr>
                <tr>
                    <td>Descrição do curso</td>
                    <td><?= $linha['descricao_curso'] ?></td>
                    <td><input type="text" name="descricao_curso" class="form-control" placeholder="Nova descrição do curso"></td>
                </tr>
                <tr>
                    <td>Modalidade</td>
                    <td><?= $linha['modalidade_curso'] ?></td>
                    <td><input type="text" name="modalidade_curso" class="form-control" placeholder="Nova Modalidade"></td>
                </tr>
                <tr>
                    <td>Área do Curso</td>
                    <td><?= $linha['area_curso'] ?></td>
                    <td><input type="text" name="area_curso" class="form-control" placeholder="Novo Area do Curso"></td>
                </tr>
                <tr>
                    <td>Pre Requisito</td>
                    <td><?= $linha['pre_requisito_curso'] ?></td>
                    <td><input type="text" name="pre_requisito_curso" class="form-control" placeholder="Novo Pre Requisito"></td>
                </tr>
                <tr>
                    <td>Valor do Curso</td>
                    <td><?= $linha['valor_curso'] ?></td>
                    <td><input type="text" name="valor_curso" class="form-control" placeholder="Novo Valor do Curso"></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>

<?php endforeach; ?>