<?php

    $pdo = new PDO(
    "mysql:host=localhost;dbname=video",
    'root',
    '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
);

?>