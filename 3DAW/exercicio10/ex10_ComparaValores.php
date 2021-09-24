<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>3DAW</h1>
<?php
        $var1 = $_GET["var1"];
        $var2 = $_GET["var2"];
        // Operadores Comparação ==, ===, !=, <>, >, <, >=, <=, <=>
        $x = 5;// maior ou igual a 5 e menor ou igual a 6.
        $y = 6;
        if ( $var1 == $var2) {
            echo "Primeiro número é igual ao segundo número, primeiro número = $var1";
        } else {
            //Condição de diferente
            echo "Primeiro número é diferente do segundo número, primeiro número = $var1 e segundo número = $var2";
        }
        echo "<br><br>";
        if ($var1 === $var2) {
            echo "Primeiro número é identico a segundo número, Primeiro número = $var1";
        } else {
            echo "primeiro número não é identico a segundo número, primeiro número = $var1 e segundo número = $var2";
        }
        echo "<br><br>";
        if ( $var1 > $var2) {  // != é semelhante a <>
            echo "Primeiro número é maior que segundo número, primeiro número = $var1";
        } elseif ($var1 < $var2)  {
            echo "Segundo número é maior que primeiro número, primeiro número = $var1, segundo número = $var2";
        }
        echo "<br><br>";
         if (  $var1 >= $x && $var1 <= $y) {
            echo "Primeiro número está entre 5 e 6, primeiro número = $var1";
        } else {
            echo "Primeiro número não está entre 5 e 6 , primeiro número = $var1";
        }
        echo "<br><br>";
        if (  $var2 >= $x && $var2 <= $y) {
            echo "Segundo número está entre 5 e 6, segundo número = $var2";
        } else {
            echo "Segundo número não está entre 5 e 6, segundo número = $var2";
        }
        echo "<br><br>";
    ?>
<br>
</body>
</html>