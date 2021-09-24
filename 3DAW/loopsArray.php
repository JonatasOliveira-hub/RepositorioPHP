<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
texto escrito antes do PHP
<?php
$nomes = array("Adalberto", "Agda", "Alexandre", "Amanda", "Brenda");

$emails = array("Adalberto@faeterj-rio.edu.br", "Agda@faeterj-rio.edu.br",
    "Alexandre@faeterj-rio.edu.br", "Amanda@faeterj-rio.edu.br", "Brenda@faeterj-rio.edu.br");

$idades = array(21,22,23,24,25);

$medias = array(7.5,7.5,7.5,7.5,7.5);
?>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
        <th>Media</th>
    </tr>
    <?php
        $a = 0;
        while ($a <= 4) {
            echo "<tr>";
            echo "<td>$nomes[$a]</td>";
            echo "<td>$emails[$a]</td>";
            echo "<td>$idades[$a]</td>";
            echo "<td>$medias[$a]</td>";
            echo "</tr>";
            $a++;
        }
        ?>
</table>
<br>
</body>
</html>