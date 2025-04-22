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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <title>FuturEdu</title>
</head>

<body id="contato">
<?php require_once('template/head.php')?>
    <main>
    <?php require_once('template/banner.php')?>

        <section class="form-section container mt-5">
        <form class="formulario" action="contato/enviarEmail" method="POST">

            <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: Maria Santos" required>
            </div>

            <div>
            <label class="mt-2" for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Ex: maria@gmail.com" required>
            </div>

            <div>
            <label class="mt-2" for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="fone" placeholder="Ex: (99) 99999-9999" maxlength="15">
            </div>

            <div>
            <label class="mt-2" for="assunto">Assunto:</label>
            <input type="text" id="assunto" name="assunto">
            </div>

            <div>
            <label class="mt-2" for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="msg" rows="5" required></textarea>
            </div>

        <div>
            <input type="submit" value="Enviar Email">
        </div>
  </form>
        </section>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <script>
  document.getElementById('telefone').addEventListener('input', function (e) {
    let input = e.target;
    input.value = input.value
      .replace(/\D/g, '')                         
      .replace(/^(\d{2})(\d)/g, '($1) $2')         
      .replace(/(\d{5})(\d)/, '$1-$2')              
      .slice(0, 15);                               
  });
</script>

    <script src="assets/js/script.js"></script>
</body>

</html>