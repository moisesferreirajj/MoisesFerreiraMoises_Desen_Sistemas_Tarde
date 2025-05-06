<?php

$conexao = new mysqli('localhost', 'root', '', 'empresa', '3306');
if ($conexao->connect_error) {
    die("Connection failed: " . $conexao->connect_error);
} else {
    echo "Connected successfully";
}

?>