<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo - Tabela PHP</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border-style: solid;
            width: 50px;
        }
    </style>
</head>
<body>
    <table>
    <?php
    for ($l=1; $l <= 5; $l++){
        echo "<tr>";
        for ($c=1; $c <=20; $c++){
            echo "<td> $l,$c </td>";
        }
        echo "</tr>";
    }
    ?>
    </table>

    <footer>
        <h2 align="center">Moises Ferreira | TDESN V3 | SENAI NORTE</h2>
    </footer>
</body>
</html>