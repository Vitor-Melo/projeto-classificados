<?php require 'pages/header.php'; ?>

<?php
require 'classes/anuncios.class.php';
require 'classes/usuario.class.php';
$a = new Anuncios();
$u = new Usuarios();

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id'];
} else {
?>
    <script type="text/javascript">
        window.location.href = "index.php";
    </script>
<?php
}
$info = $a->getAnuncio($id);

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5">
            <div id="meuCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($info['fotos'] as $chave => $foto) : ?>
                        <div class="carousel-item <?php echo ($chave == '0') ? 'active' : ''; ?>">
                            <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#meuCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#meuCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
        <div class="col-sm-7">
            <h1><?php echo $info['titulo']; ?></h1>
            <h4><?php echo $info['categoria']; ?></h4>
            <p><?php echo $info['descricao']; ?></p>
            <br></br>
            <h3>R$<?php echo number_format($info['valor'], 2); ?></h3>
            <h4><?php echo $info['telefone']; ?></h4>
        </div>
    </div>

    <?php require 'pages/footer.php'; ?>