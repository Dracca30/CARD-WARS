<?php

use Dom\Mysql;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "racca_db");

function openDBConnection()
{
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($connection->connect_errno) {
        throw new Exception("Connessione al server fallita : " . $connection->connect_error);
    }

    return $connection;
}

function closeDBConnection($db_connection)
{
    $db_connection->close();
}

function checkLogin($db_connection, $username, $password)
{
    $db_connection->select_db(DB_NAME);

    $query = "SELECT id, password FROM users WHERE username=?";

    $stmt = $db_connection->prepare($query);
    if (!$stmt)
        throw new Exception("Query fallita: " . $db_connection->error);

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $result->free();
        throw new Exception("Username o password errati");
    } else {
        $row = $result->fetch_assoc();
        $result->free();

        if (!password_verify($password, $row["password"])) {
            throw new Exception("Username o password errati");
        }

        return $row["id"];
    }
}

function signupUser($db_connection, $email, $password, $username)
{
    $db_connection->select_db(DB_NAME);

    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    $stmt = $db_connection->prepare($query);
    if (!$stmt)
        throw new Exception("Query fallita : " . $db_connection->error);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt->bind_param("sss", $username, $email,$hashed_password);

    $stmt->execute();
}

function isUsernameTaken($db_connection, $username) {
    $count = 0;
    $db_connection->select_db(DB_NAME);

    $query = "SELECT COUNT(*) FROM users WHERE username = ?";
    $stmt = $db_connection->prepare($query);
    if (!$stmt) throw new Exception("Query fallita: " . $db_connection->error);

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->bind_result($count);
    $stmt->fetch();

    return $count > 0;
}

function getUser($db_connection, $user_id) {
    $db_connection->select_db(DB_NAME);

    $query = "SELECT email FROM users WHERE id = ?";

    $stmt = $db_connection->prepare($query);
    if(!$stmt)
        throw new Exception("Query fallita : ". $db_connection->error);

    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $results = $stmt->get_result();
    $row = $results->fetch_assoc();

    return $row["email"];
}

function getCards($db_connection) {
    $db_connection->select_db(DB_NAME);

    $query = "SELECT * FROM cards";
    $result = $db_connection->query($query);
    
    if (!$result)
        throw new Exception("Query fallita : " . $db_connection->error);

    return $result->fetch_all(MYSQLI_ASSOC);
}

// FUNZIONE UTILIZZATA PER INSERIRE DEGLI USER PREDEFINITI CON PASSWORD HASHATA

/*function insertMultipleUsers($db_connection, $users) {
    $db_connection->select_db(DB_NAME);

    $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $db_connection->prepare($query);

    if (!$stmt) {
        throw new Exception("Query fallita: " . $db_connection->error);
    }

    foreach ($users as $user) {
        $username = $user['username'];
        $email = $user['email'];
        $plainPassword = $user['password'];
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

        $stmt->bind_param("sss", $username, $email, $hashedPassword);
        $stmt->execute();
    }

    $stmt->close();
}*/
?>