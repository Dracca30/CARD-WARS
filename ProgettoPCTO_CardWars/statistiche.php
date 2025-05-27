<?php
session_start();
require_once "database.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$db = openDBConnection();

$userId = $_SESSION["user_id"];
$stats = [
    'games_played' => 0,
    'games_won' => 0,
    'games_lost' => 0,
    'points' => 0
];

$stmt = $db->prepare("SELECT games_played, games_won, games_lost, points FROM user_stats WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $stats = $row;
}

$ranking = 1;
$stmt = $db->prepare("SELECT user_id FROM user_stats ORDER BY points DESC");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    if ($row["user_id"] == $_SESSION["user_id"]) {
        break;
    }
    $ranking++;
}

$stmt->close();
closeDBConnection($db);

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
    <link rel="stylesheet" href="css/statistiche.css">
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

    <main class="stats-section">
        <div class="container text-center">
            <h2 class="mb-5">Statistiche del giocatore</h2>
            <div class="row g-4 justify-content-center">

                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <h5 class="card-title">Partite giocate</h5>
                            <p class="display-6"><?php echo $stats['games_played']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <h5 class="card-title">Vittorie</h5>
                            <p class="display-6"><?php echo $stats['games_won']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card">
                        <div class="card-body">
                            <h5 class="card-title">Sconfitte</h5>
                            <p class="display-6"><?php echo $stats['games_lost']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card stat-card highlight">
                        <div class="card-body">
                            <h5 class="card-title">Punti totali</h5>
                            <p class="display-6"><?php echo $stats['points']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <div class="card stat-card rank-card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Posizione in classifica</h5>
                                <p class="display-5">#<?php echo $ranking; ?></p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
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