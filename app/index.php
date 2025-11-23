<?php

// Página inicial
if ($_SERVER["REQUEST_URI"] === "/" || $_SERVER["REQUEST_URI"] === "/index.php") {
    readfile("index.html");
    exit;
}

header("Content-Type: application/json");

echo json_encode([
    "mensagem" => "Bem-vindo ao Activity Provider!",
    "autor" => "Pedro Pereira"
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
