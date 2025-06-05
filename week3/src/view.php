<?php
include 'db.php';

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM posts WHERE id = $id");

$row = $result->fetch_assoc();
?>

