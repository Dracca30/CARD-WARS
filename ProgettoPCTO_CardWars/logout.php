<?php
    session_start();
    session_destroy();
    header("Location: index.php?message=". urlencode("Uscita avvenuta con successo!"));
    exit();
?>