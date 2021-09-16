<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $var1 = $_GET["var1"];
        $var2 = $_GET["var2"];
        $resultado = $var1 + $var2;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teste PHP</title>
</head>
<body>
    <h1>3DAQ</h1>
    <form action="respostaCalcular.php" method=GET>
        <h3>Soma</h3>
        <input type=number name="var1" value=<?php echo $var1 ?>> +
        <input type=number name="var2" value=<?php echo $var1 ?>> =
        <input type=number name="resultado" value=<?php echo $var1+$var2 ?>>
        <input type="submit" value="Calcular">
    </form>
    <br>   
</body>
</html>