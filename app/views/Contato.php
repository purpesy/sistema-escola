<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- SLICK CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">

    <!-- LITY CSS -->
    <link href="https://cdn.jsdelivr.net/npm/lity@2.4.1/dist/lity.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>FuturEdu</title>
</head>

<body id="contato">
<?php require_once('template/head.php')?>
    <main>
    <?php require_once('template/banner.php')?>
    
    <?php require_once('template/carrossel.php')?>

        <section class="categorias">
            <div class="site">
                <div>
                    <h3 class="effra-regular">CURSOS POPULARES</h3>
                    <h2 class="effra">Principais Cursos de Desenvolvimento</h2>
                </div>
                <div class="cards-categoria effra-regular">
                <?php foreach ($cursos as $linha): ?>
                    <div class="card-categoria">
                        <div class="pad-categorias">
                            <img src="assets/img/categorias/<?php echo $linha['foto_curso']; ?>" alt=<?php echo $linha['alt_curso']; ?>>
                            <h2><?php echo $linha['nome_curso']; ?></h2>
                            <p><?php echo $linha['carga_horaria_curso']. ' Horas e R$ '. $linha['valor_curso']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="btn-categoria sofast">
                    <a href="curso"><span>VER TODOS CURSOS</span></a></div>
                </div>
        </section>

    <?php require_once('template/cursos.php')?>

    <?php require_once('template/sobre.php')?>  
    </main>
    
    <button id="btnVoltarTopo" class="btn-voltar-topo">
        <i class="fa-solid fa-angle-up fa-xs"></i>
    </button>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- SLICK JS -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- LITY JS -->
    <script src="https://cdn.jsdelivr.net/npm/lity@2.4.1/dist/lity.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>

?>