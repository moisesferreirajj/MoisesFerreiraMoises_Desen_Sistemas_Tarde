<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For de Repetição - PHP</title>
</head>
<body>
    <?php
    for ($i = 0; $i < 10; $i++) {
        print "O quadrado de $i é " . $i * $i . "<br>";
    }
    ?>

    <br>
    
    <?php
    for($i = 2; $n = system('dir /b'); $i++){
        echo ($n);
        if ($i == 10) {
            break;
        }
    }
    ?>

    <footer>
        <h2 align="center">Moises Ferreira | TDESN V3 | SENAI NORTE</h2>
    </footer>
</body>
</html>