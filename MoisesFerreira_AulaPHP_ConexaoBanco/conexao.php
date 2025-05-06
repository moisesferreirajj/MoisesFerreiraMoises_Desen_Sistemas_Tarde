<?php

$conexao = mysqli_connect ('localhost', 'root', '', 'empresa', '3306');
if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

?>