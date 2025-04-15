<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de CASE - PHP</title>
</head>
<body>
    <?php
    $s = "lampada";
    switch ($s) {
        case "casa":
            print "A casa é amarela!";
            break;
        case "arvore":
            print "A árvore é bonita!";
            break;
        case "lampada":
            print "João apagou a lâmpada!";
            break;
        default:
            print "Você não selecionou nada!";
            break;
    }
    ?>

    <footer>
        <h2 align="center">Moises Ferreira | TDESN V3 | SENAI NORTE</h2>
    </footer>
</body>
</html>