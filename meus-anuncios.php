<?php require 'pages/header.php' ?>
<?php if (empty($_SESSION['cLogin'])) {
?>
    <script type="text/javascript">
        window.location.href = "login.php";
    </script>
<?php
    exit;
}
?>

<div class="container">
    <h1>Meus Anúncios</h1>

    <a href="add-anuncio.php" class="btn btn-success">Adicionar</a>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Fotos</th>
                <th>Título</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php require 'classes/anuncios.class.php';
        $a = new Anuncios();
        $anuncios = $a->getMeusAnuncios();
        foreach ($anuncios as $anuncio) :
        ?>
            <tbody>
                <tr>
                    <?php if (!isset($anuncio['url']) && empty($anuncio['url'])): ?>
                        <td><img src="assets/images/default.png" border="0" style="width:35px;" /></td>
                    <?php else: ?>
                    <td><img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" border="0" style="width:35px;"/></td>
                    <?php endif; ?>
                    <td><?php echo $anuncio['titulo']; ?></td>
                    <td>R$ <?php echo number_format($anuncio['valor'], 2); ?></td>
                    <td>
                        <a href="editar-anuncio.php?id=<?php echo $anuncio['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="excluir-anuncio.php?id=<?php echo $anuncio['id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</div>

<?php require 'pages/footer.php' ?>