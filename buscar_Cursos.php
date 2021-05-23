<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);
$crawler = new Crawler();
$url = 'https://www.alura.com.br/cursos-online-programacao/php';
$filtro = 'span.card-curso__nome';

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar($url, $filtro);

foreach ($cursos as $curso) {
    echo $curso->textContent . PHP_EOL;
}
