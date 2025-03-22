<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Verifica se a aplicação está em modo de manutenção
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registra o autoloader do Composer
require __DIR__.'/../vendor/autoload.php';

// Inicializa a aplicação Laravel
$app = require_once __DIR__.'/../bootstrap/app.php';

// Resolve o Kernel da aplicação
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Captura a requisição HTTP
$response = $kernel->handle(
    $request = Request::capture()
);

// Envia a resposta para o navegador
$response->send();

// Finaliza a requisição
$kernel->terminate($request, $response);
