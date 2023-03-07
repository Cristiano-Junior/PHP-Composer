<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);

$response = $client->request('GET', 'https://cursos.alura.com.br/category/programacao/php');

$html = $response->getBody()->getContents();

var_dump($html);

$crawler = new Crawler();
$crawler->addHtmlContent($html);
$cursos = $crawler->filter('li.card-list__item');

foreach($cursos as $curso)
{
    echo $curso->textContent . PHP_EOL;
}

echo $response->getStatusCode();
