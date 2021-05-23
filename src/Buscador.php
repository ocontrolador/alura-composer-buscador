<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

use function PHPSTORM_META\type;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url, string $filtro): object
    {
        $html = $this->httpClient->request('GET', $url)->getBody();

        $this->crawler->addHtmlContent($html);

        return $this->crawler->filter($filtro);
    }
}
