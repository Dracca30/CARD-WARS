<?php
include_once("database.php");
try {
    $connection = openDBConnection();
    $cards = getCards($connection);
} catch (Exception $ex) {
    header("Location: index.php?error=" . urlencode($ex->getMessage()));
    exit();
} finally {
    if (isset($connection)) {
        closeDBConnection($connection);
    }
}

?>

<!doctype html>
<html lang="it">

<head>
    <title>Card Wars</title>
    <link rel="icon" href="img/Icona.ico" type="image/x-icon">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/grimorio.css">
    <script src="js/grimorio.js"></script>
</head>

<body>
    <header id="headerId">
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-md-none" href="index.php">
                    <img src="img/Logo.png" alt="Logo Card Wars" style="height: 70px;">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="guide.html">Guida del Campione</a></li>
                        <li class="nav-item"><a class="nav-link" href="grimorio.php">Grimorio delle Carte</a></li>
                        <li class="nav-item"><a class="nav-link" href="arena.php">Arena</a></li>
                        <li class="nav-item"><a class="nav-link" href="clientServ.php">Aiuto dal Regno</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <img src="img/Logo.png" alt="Logo card wars" id="logoId" class="d-none d-md-block">

        <h1 id="mobileTitle" class="d-block d-md-none text-center mt-3">CARD WARS KINGDOM</h1>
        <?php
        if (isset($_GET["message"])) {
            $message = $_GET["message"];
        } else if (isset($_GET["error"])) {
            $error = $_GET["error"];
            echo "<div role=\"alert\" class=\"alert alert-danger\">$error</div>";
        }
        ?>
    </header>
    <div class="modal fade" id="cardModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-body text-center">
                    <img id="modalCardImage" src="" alt="Carta" class="img-fluid mb-3" style="max-height: 300px;">
                    <p id="modalCardDetails">Dettagli carta...</p>
                    <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    <main>
        <h1 id="idTitle">Il Grimorio delle carte</h1>
        <div class="container mb-3">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-2">
                <?php
                if (isset($cards)) {
                    foreach ($cards as $card) {
                        echo '<div class="col">';
                        echo '<div class="card h-100" style="max-width: 100%;">';
                        $data_json = htmlspecialchars(json_encode($card), ENT_QUOTES, 'UTF-8');
                        echo '<img src="' . htmlspecialchars($card["image_url"]) . '" class="card-img-top" alt="Immagine carta" onclick=\'showCardModal(' . $data_json . ')\' >';
                        echo '</div></div>';
                    }
                }
                ?>
            </div>
        </div>
        <p id="idParagraph1">Il Database è ancora in caricamento, ci scusiamo per il disagio</p>
        <p id="idParagraph2">Sono più di 500 carte prof cerchi di biasimarmi 🙏</p>
    </main>
    <footer class="footer">
        <h2 class="footer-title">CARD WARS<br>KINGDOM</h2>

        <div class="footer-symbols">
            <span class="symbol">ᛚ</span>
            <span class="symbol">ᛁ</span>
            <span class="symbol">ᚳ</span>
            <span class="symbol">ᚻ</span>
        </div>



        <p class="footer-copyright">© 2025 CARD WARS KINGDOM — Ogni diritto riservato a chi vuole nuove avventure.</p>
    </footer>
</body>

</html>