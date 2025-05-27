<?php
session_start();
require_once "database.php";
$db = openDBConnection();

if (!isset($_SESSION['user_id'])) {
    die("Utente non autenticato.");
}

$userId = $_SESSION['user_id'];

// Prendi 31 utenti casuali (escludendo l'utente loggato)
$stmt = $db->prepare("SELECT users.id, users.username FROM users JOIN user_stats ON users.id = user_stats.user_id WHERE users.id != ? ORDER BY RAND() LIMIT 31");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$players = [];
while ($row = $result->fetch_assoc()) {
    $players[] = ['id' => $row['id'], 'name' => $row['username']];
}
$stmt->close();

// Aggiungi l'utente loggato alla lista
$stmt = $db->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

$players[] = ['id' => $userId, 'name' => $username];
shuffle($players);

$db->close();

echo "<script>const players = " . json_encode($players) . ";</script>";
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
    <link rel="stylesheet" href="css/torneo.css">
    <script src="js/torneo.js"></script>
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

                <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                    <ul class="navbar-nav gap-3 mx-auto">
                        <li class="nav-item"><a class="nav-link" href="profile.php">Cronache dell'Eroe</a></li>
                        <li class="nav-item"><a class="nav-link" href="statistiche.php">Specchio del Valore</a></li>
                        <li class="nav-item"><a class="nav-link" href="torneo.php">Sfida dei Campioni</a></li>
                    </ul>
                    <form class="d-flex" action="logout.php" method="post">
                        <button type="submit">Esci</button>
                    </form>
                </div>
            </div>
        </nav>

        <img src="img/Logo.png" alt="Logo card wars" id="logoId" class="d-none d-md-block">

        <h1 id="mobileTitle" class="d-block d-md-none text-center mt-3">CARD WARS KINGDOM</h1>

        <?php
        if (isset($_GET["message"])) {
            $message = $_GET["message"];
            echo "<div role=\"alert\" class=\"alert alert-success\">$message</div>";
        } else if (isset($_GET["error"])) {
            $error = $_GET["error"];
            echo "<div role=\"alert\" class=\"alert alert-danger\">$error</div>";
        }
        ?>
    </header>

    <main class="container my-5">
        <div id="overlay">
            <button id="startBtn" class="btn btn-outline-warning btn-lg">Avvia Torneo</button>
        </div>

        <section id="tournament">
            <h2 class="text-center mb-4">Torneo</h2>

            <div id="gironiSection">
                <h3 class="text-warning">Fase a Gironi</h3>
                <div class="row" id="gironiContainer"></div>
            </div>

            <div id="eliminazioneDiretta">
                <h3 class="text-warning mt-5">Fase a Eliminazione Diretta</h3>
                <div id="knockoutContainer"></div>
            </div>

            <div id="vincitore" class="text-center mt-5">
                <h2>Vincitore:</h2>
                <h1 id="championName" class="text-warning"></h1>
            </div>
        </section>
        <div id="nuovoTorneoDiv" class="text-center mt-4" style="display: none;">
            <button id="restartBtn" class="btn btn-outline-primary">Nuovo Torneo</button>
        </div>
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