<div class="card mb-4">
    <div class="card-header d-flex">
        <h3 class="card-title">Listar Cursos</h3>
        <a href="<?= URL_BASE ?>curso/criar" class="btn btn-success ms-auto">
            <i class="bi bi-plus">Novo Curso</i>
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Nível</th>
                    <th>Modalidade</th>
                    <th>Valor</th>
                    <th>CH</th>
                    <th>Área</th>
                    <th>Requisito</th>
                    <th>Editar</th>
                    <th>Desativar</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($cursos as $linha): ?>
                    <tr class="align-middle">
                        <td>
                            <a href="<?= URL_BASE ?>assets/img/categorias/<?= $linha['foto_curso']; ?>" data-lightbox="curso<?= $linha['id_curso']; ?>" data-title="<?= $linha['nome_curso']; ?>">
                                <img src="<?= URL_BASE ?>assets/img/categorias/<?= $linha['foto_curso']; ?>"
                                    style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; cursor: pointer;">
                            </a>
                        </td>
                        <td><?= $linha['nome_curso']; ?></td>
                        <td><?= $linha['nivel_curso']; ?></td>
                        <td><?= $linha['modalidade_curso']; ?></td>
                        <td>R$ <?= $linha['valor_curso']; ?></td>
                        <td><?= $linha['carga_horaria_curso']; ?></td>
                        <td><?= $linha['area_curso']; ?></td>
                        <td><?= $linha['pre_requisito_curso']; ?></td>
                        <td>
                            <a href="<?= URL_BASE ?>curso/editar/<?= $linha['id_curso']; ?>" class="btn btn-warning bg-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?= URL_BASE ?>curso/desativar/<?= $linha['id_curso']; ?>" class="btn btn-danger bg-danger">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>