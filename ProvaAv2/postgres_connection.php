<?php 
try {
    $dbconn = new PDO("pgsql:host=localhost;port=1500;dbname=postgres;user=postgres;password=postgres");
    $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbconn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}
?>