<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>3DAW</h1>
<?php
function soma($a, $b) {
    echo $a + $b;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["var1"];
    $y = $_POST["var2"];

    if ( $x != "" and $y != "") {
        soma($x, $y);
    } 
}
?>
<br>
<form action="ex12_Calculadora.php" method=POST>
    <h3>Soma dois numeros</h3>
    a: <input type=number name="var1"> +
    b: <input type=number name="var2"> = 
    <br><br>
    <input type="submit" value="Formatar">
</form>
<br>
</body>
</html>


