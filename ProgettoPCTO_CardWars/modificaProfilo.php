<?php
session_start();
require_once "database.php";

$message = "";
$error = "";

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$db = openDBConnection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newUsername = trim($_POST["username"]);
    $newEmail = trim($_POST["email"]);
    $newPassword = trim($_POST["password"]);

    try {
        if (!empty($newUsername)) {
            $stmt = $db->prepare("UPDATE users SET username = ? WHERE id = ?");
            $stmt->bind_param("si", $newUsername, $_SESSION["user_id"]);
            $stmt->execute();
            $_SESSION["username"] = $newUsername;
        }

        if (!empty($newEmail)) {
            $stmt = $db->prepare("UPDATE users SET email = ? WHERE id = ?");
            $stmt->bind_param("si", $newEmail, $_SESSION["user_id"]);
            $stmt->execute();
            $_SESSION["email"] = $newEmail;
        }

        if (!empty($newPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->bind_param("si", $hashedPassword, $_SESSION["user_id"]);
            $stmt->execute();
        }

        closeDBConnection($db);
        header("Location: profile.php?message=Profilo+aggiornato+con+successo");
        exit();
    } catch (Exception $e) {
        $error = "Errore durante l'aggiornamento.";
    }
}

closeDBConnection($db);
?>

<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/modificaProfilo.css">
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
    <main>
        <form method="POST" class="mx-auto mt-4" id="formModifica">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control"
                    value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Nuova Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Inserisci nuova email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Nuova Password</label>
                <input type="password" name="password" id="password" class="form-control"
                    placeholder="Lascia vuoto se non vuoi cambiarla">
            </div>

            <button type="submit" class="btn btn-danger w-100">Salva Modifiche</button>
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