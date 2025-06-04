<?php
$mysqli = new mysqli("db", "exampleuser", "examplepass", "exampledb");
if ($mysqli->connect_error)
{
    die("DB 연결 실패: ". $mysqli->connect_error);
}

session_start();
?>

