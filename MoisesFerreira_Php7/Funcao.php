<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções em PHP</title>
</head>
<body>
    <?php
    $name = "Moises Ferreira";
    $length = strlen($name);
    $cmp = strcmp($name, "Brian Lee");
    $index = strpos($name, "e");
    $first = substr($name, 0, 6);
    $name = strtoupper($name);
    ?>

    <h1 align="center">Funções em PHP</h1>
    <p>
        O nome é: <?php echo $name; ?><br>
        O tamanho do nome é: <?php echo $length; ?><br>
    <!-- Se o nome for maior que Brian Lee retorna 1, se o nome for igual, retorna 0 -->
        O nome comparado com Brian Lee é: <?php echo $cmp; ?><br>
        A posição do primeiro "e" no nome é: <?php echo $index; ?><br>
        O primeiro nome é: <?php echo $first; ?><br>
        O nome em letras maiúsculas é: <?php echo $name; ?><br>
    </p>

    <?php
    $cidade = "Joinville";
    $estado = "SC";
    $idade = '174';
    $frase_capital = "A melhor cidade de $estado é $cidade e ela tem $idade anos.";
    $frase_idade = "$cidade tem mais de $idade anos.";
    
    echo "<h3>$frase_capital</h3>";
    echo "<h4>$frase_idade</h4>";
    ?>

    <?php
    //Declara variável numérica:
    $umidade = 91;
    //Testa se $umidade é maior que 90, retorna um bool.
    $vaiChover = ($umidade > 90);
    //Testa se $vaiChover é verdadeiro
    if ($vaiChover) {
        echo "Vai chover com toda certeza absoluta da Terra!";
    } else {
        echo "Não vai chover!";
    }
    ?>

    <?php
    $a = 17;
    if ($a > 17) {
        print "Maior de idade. <br>";
    } else {
        print "Menor de idade. <br>";
    }
    ?>

    <footer>
        <h2 align="center">Moises Ferreira | TDESN V3 | SENAI NORTE</h2>
    </footer>
</body>
</html>