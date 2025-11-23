<?php

$basePath = __DIR__;

// Página inicial
if ($_SERVER["REQUEST_URI"] === "/" || $_SERVER["REQUEST_URI"] === "/index.php") {
    header("Content-Type: text/html; charset=utf-8");
    $htmlFile = $basePath . "/index.html";
    if (file_exists($htmlFile)) {
        readfile($htmlFile);
    } else {
        echo "<h1>Ficheiro index.html não encontrado</h1>";
    }
    exit;
}

// Todos os outros endpoints retornam JSON
header("Content-Type: application/json; charset=utf-8");

// /configuration (GET)
if ($_SERVER["REQUEST_URI"] === "/configuration" && $_SERVER["REQUEST_METHOD"] === "GET") {
    echo json_encode([
        "mensagem" => "Configuração concluída com sucesso.",
        "autor" => "Pedro Pereira",
        "exemplo" => "Olá Mundo - configuration"
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// /parameters (GET)
if ($_SERVER["REQUEST_URI"] === "/parameters" && $_SERVER["REQUEST_METHOD"] === "GET") {
    echo json_encode([
        "mensagem" => "Parâmetros disponíveis.",
        "exemplo" => "Olá Mundo - parameters"
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// /deploy (POST)
if ($_SERVER["REQUEST_URI"] === "/deploy" && $_SERVER["REQUEST_METHOD"] === "POST") {
    echo json_encode([
        "mensagem" => "Pedido de deploy recebido.",
        "estado" => "Sucesso",
        "exemplo" => "Olá Mundo - deploy"
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// /analytics (GET)
if ($_SERVER["REQUEST_URI"] === "/analytics" && $_SERVER["REQUEST_METHOD"] === "GET") {
    echo json_encode([
        "mensagem" => "Dados de analytics disponíveis.",
        "exemplo" => "Olá Mundo - analytics"
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// /analyticsRequest (POST)
if ($_SERVER["REQUEST_URI"] === "/analyticsRequest" && $_SERVER["REQUEST_METHOD"] === "POST") {
    echo json_encode([
        "mensagem" => "Pedido de analytics recebido.",
        "exemplo" => "Olá Mundo - analyticsRequest"
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// Endpoint desconhecido
echo json_encode([
    "erro" => "O endpoint solicitado não existe.",
    "url" => $_SERVER["REQUEST_URI"]
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
