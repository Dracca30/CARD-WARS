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
    <link rel="stylesheet" href="css/clientServ.css">
    <script src="js/script.js"></script>
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
        <h1>Aiuto dal regno</h1>
    </header>
    <main>
        <form id="formSegnalazioni" action="thanks.html">
            <h3>Cosa vuoi segnalare?</h3>
            <select class="form-control" id="selectProblem">
                <option>Segnala un bug</option>
                <option>Segnala un giocatore</option>
                <option>Altro</option>
            </select>
            <div class="form-group mt-3">
                <label for="email">Inserisci una mail alla quale possiamo contattarti</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="Email" required>
            </div>
            <div class="form-group mt-3">
                <label>Inserisci più dettagli:</label>
                <textarea class="form-control" aria-describedby="moreHelp"></textarea>
            </div>
            <button type="submit">Segnala</button>
        </form>
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