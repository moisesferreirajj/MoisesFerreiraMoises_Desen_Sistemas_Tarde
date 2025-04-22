<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo - Tabela PHP</title>
    <style>
        table {
            border-collapse: collapse;
            align: center;
            justify-content: center;
            margin: auto;
        }

        th, td {
            border-style: solid;
            width: 100px;
        }
    </style>
</head>
<body>
    <h1 align="center">Tabuada do 1 ao 10:</h1>
    <table>
    <?php
    for ($l=1; $l <= 10; $l++){
        echo "<tr>";
        for ($c=1; $c <=10; $c++){
            $resultado = $c*$l;
            echo "<td> $c x $l = $resultado </td>";
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