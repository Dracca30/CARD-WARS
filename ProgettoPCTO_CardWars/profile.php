<?php
session_start();
include_once("database.php");

try {
    $connection = openDBConnection();

    if (isset($_SESSION["user_id"])) {
        $userId = $_SESSION["user_id"];
        $username = $_SESSION["username"];
        $email = $_SESSION["email"];
    } else if (isset($_POST["username"]) && isset($_POST["password"])) {
        $userId = checkLogin($connection, $_POST["username"], $_POST["password"]);
        $_SESSION["user_id"] = $userId;
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["email"] = getUser($connection, $userId);

        $username = $_SESSION["username"];
        $email = $_SESSION["email"];
    } else {
        header("Location: index.php");
        exit();
    }
} catch (Exception $ex) {
    session_destroy();
    header("Location: index.php?error=" . urlencode($ex->getMessage()));
    exit();
} finally {
    closeDBConnection($connection);
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
    <link rel="stylesheet" href="css/profile.css">
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
        } else if (isset($_GET["error"])) {
            $error = $_GET["error"];
            echo "<div role=\"alert\" class=\"alert alert-danger\">$error</div>";
        }
        ?>
    </header>
    <main class="container mb-5">
        <h1 class="text-center">Ben ritornato <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>

        <section class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card bg-dark text-light border-danger shadow">
                    <div class="card-header bg-danger text-center text-light">
                        Il tuo profilo
                    </div>
                    <div class="card-body">
                        <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION["username"]); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
                        <p><strong>ID Eroe:</strong> <?php echo $_SESSION["user_id"]; ?></p>
                    </div>
                </div>

                <div class="card bg-dark text-light border-secondary mt-4 shadow">
                    <div class="card-header bg-secondary text-center text-light">
                        Azioni rapide
                    </div>
                    <div class="card-body d-grid gap-2">
                        <a href="modificaProfilo.php" class="btn btn-outline-warning">Modifica profilo</a>
                        <a href="statistiche.php" class="btn btn-outline-light">Vedi statistiche</a>
                        <a href="torneo.php" class="btn btn-outline-danger">Partecipa a un torneo</a>
                    </div>
                </div>
            </div>
        </section>
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