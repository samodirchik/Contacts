<?php

$db = mysqli_connect('localhost', 'root', '', 'contacts');

if (!$db) {
    die('Error connect to DataBase');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM numbers WHERE id=$id") or die($mysqli->error());

    $row = $result->fetch_array();
    $name = $row['name'];
    $phone = $row['phone'];
}